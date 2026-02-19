<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use App\Models\StockMovement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        try {
            $invoices = Invoice::with(['InvoiceItems.product.category'])->orderByDesc('id')->get();

            return response()->json([
                "success" => true,
                "message" => 'Invoices list fetched successfully',
                'invoice-list' => $invoices
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching invoices',
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'invoice_no' => ['nullable', 'string', 'max:255', 'unique:invoices,invoice_no'],
                'invoice_date' => ['required', 'date'],
                'invoiceItems' => ['required', 'array', 'min:1'],
                'invoiceItems.*.product_id' => ['required', 'integer', 'exists:products,id'],
                'invoiceItems.*.quantity' => ['required', 'integer', 'min:1'],
                'invoiceItems.*.unit_price' => ['required', 'numeric', 'min:0'],
                'invoiceItems.*.discount_type' => ['nullable', 'string', 'in:fixed,percent'],
                'invoiceItems.*.discount_value' => ['nullable', 'numeric', 'min:0'],
                "invoiceItems.*.discount_amount" => ['nullable', 'numeric', 'min:0'],
                'invoiceItems.*.line_total' => ['required', 'numeric', 'min:0'],
                'subtotal' => ['required', 'numeric', 'min:0'],
                'discount_type' => ['nullable', 'string', 'in:fixed,percent'],
                'discount_value' => ['nullable', 'numeric', 'min:0'],
                'discount_amount' => ['nullable', 'numeric', 'min:0'],
                'grand_total' => ['required', 'numeric', 'min:0'],
                'status' => ['nullable', 'string', 'in:draft,finalized,paid,cancelled'],
            ]);

            // invoice creation logic to be implemented here
            DB::beginTransaction();

            $invoice = Invoice::create([
                'invoice_no' => $validated['invoice_no'],
                'invoice_date' => $validated['invoice_date'],
                'subtotal' => $validated['subtotal'],
                'discount_type' => $validated['discount_type'] ?? null,
                'discount_value' => $validated['discount_value'] ?? null,
                'discount_amount' => $validated['discount_amount'] ?? null,
                'grand_total' => $validated['grand_total'],
                'status' => $validated['status'] ?? 'draft',
            ]);

            foreach ($validated['invoiceItems'] as $itemData) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $itemData['product_id'],
                    'quantity' => $itemData['quantity'],
                    'unit_price' => $itemData['unit_price'],
                    'discount_type' => $itemData['discount_type'] ?? null,
                    'discount_value' => $itemData['discount_value'] ?? null,
                    'discount_amount' => $itemData['discount_amount'] ?? null,
                    'line_total' => $itemData['line_total'],
                ]);
            }
            // create stock movements for the invoice items id finalzied
            if ($invoice->status === 'finalized') {
                $this->createStockMovements($invoice);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Invoice created successfully',
                'invoice-data' => $invoice->load('invoiceItems.product.category'),
            ], 201);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ],422);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Somthing went wrong while creating invoice.',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function createStockMovements(Invoice $invoice)
    {
        foreach ($invoice->invoiceItems as $item) {
            // logic to create stock movement for each item
            $product = Product::findOrFail($item->product_id);

            // stock availablity
            if ($product->stock_qty < $item->quantity) {
                throw new Exception("Insufficien stock for product: {$product->product_name}. Available: {$product->stock_qty}, Required: {$item->quantity}");
            }

            // create stock movement
            StockMovement::create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'type' => 'OUT',
                'note' => "Stock OUT for Invoice #{$invoice->invoice_no}",
                "invoice_id" => $invoice->id,
            ]);

            // Update product stock qunatity
            $product->stock_qty -= $item->quantity;
            $product->save();

        }
    }

    public function show(int $id)
    {
        $invoice = Invoice::with(['invoiceItems.product.category'])->find($id);
        try {
            if (!$invoice) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invoice not fount',
                    'data' => $invoice,
                ], 404);
            }
            return response()->json([
                'success' => true,
                'message' => 'Invoice fetched successfully',
                'data' => $invoice,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching invoice',
                'errors' => $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request, int $id)
    {
        try{
            $invoice = Invoice::with(['invoiceItems'])->findOrFail($id);

            if($invoice->status === 'finalized'){
                return response()->json([
                    'success' => false,
                    'message' => 'Finalized invoice cannot be updated',
                ], 400);
            }

            $validated = $request->validate([
                'invoice_no' => ['sometimes', 'required', 'string', 'max:255', 'unique:invoices,invoice_no,' . $invoice->id],
                'invoice_date' => ['sometimes', 'required', 'date'],
                'invoiceItems' => ['sometimes', 'required', 'array', 'min:1'],
                'invoiceItems.*.product_id' => ['required', 'integer', 'exists:products,id'],
                'invoiceItems.*.quantity' => ['required', 'integer', 'min:1'],
                'invoiceItems.*.unit_price' => ['required', 'numeric', 'min:0'],
                'invoiceItems.*.discount_type' => ['nullable', 'string', 'in:fixed,percent'],
                'invoiceItems.*.discount_value' => ['required', 'numeric', 'min:0'],
                "invoiceItems.*.discount_amount" => ['required', 'numeric', 'min:0'],
                'invoiceItems.*.line_total' => ['required', 'numeric', 'min:0'],
                'subtotal' => ['sometimes', 'required', 'numeric', 'min:0'],
                'discount_type' => ['nullable', 'string', 'in:fixed,percent'],
                'discount_value' => ['required', 'numeric', 'min:0'],
                'discount_amount' => ['sometimes', 'nullable', 'numeric', 'min:0'],
                'grand_total' => ['sometimes', 'required', 'numeric', 'min:0'],
                'status' => "sometimes|string|in:draft,finalized,cancelled"
            ]);

            DB::beginTransaction();

            $oldStatus = $invoice->status;

            if(isset($validated['invoiceItems'])){
                // delete old items of invoice 
                $invoice->invoiceItems()->delete();

                // create new items in inovice
                foreach($validated['invoiceItems'] as $itemData){
                    InvoiceItem::create([
                        'invoice_id' => $invoice->id,
                        "product_id" => $itemData['product_id'],
                        "quantity" => $itemData['quantity'],
                        "unit_price" => $itemData['unit_price'],
                        "discount_type" => $itemData['discount_type'] ?? null,
                        "discount_value" => $itemData['discount_value'] ?? null,
                        "discount_amount" => $itemData['discount_amount'] ?? null,
                        "line_total" => $itemData['line_total'],
                    ]);
                }
            }

            $updatedData = [
                'invoice_no' => $validated['invoice_no'] ?? $invoice->invoice_no,
                'invoice_date' => $validated['invoice_date'] ?? $invoice->invoice_date,
                'discount_type' => $validated['discount_type'] ?? $invoice->discount_type,
                'discount_value' => $validated['discount_value'] ?? $invoice->discount_value,
                'status' => $validated['status'] ?? $invoice->status,
            ];

            if(isset($validated['subtotal'])){
                $updatedData['subtotal'] = $validated['subtotal'];
                $updatedData['discount_amount'] = $validated['discount_amount'];
                $updatedData['grand_total'] = $validated['grand_total'];
            }elseif(isset($validated['discount_amount'])){
                $updatedData['discount_amount'] = $validated['discount_amount'];
                $updatedData['grand_total'] = $validated['grand_total'];
            }
              
            $invoice->update($updatedData);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "Invoice updated successfully",
            ], 200);
        }catch(ValidationException $e){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ],422);
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating invoice',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

}

