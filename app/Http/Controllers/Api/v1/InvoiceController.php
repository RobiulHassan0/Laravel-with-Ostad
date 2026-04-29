<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use App\Models\StockMovement;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class InvoiceController extends Controller
{
    public function index(){
        try{
            $invoices = Invoice::with(['invoiceItems.product.category'])->orderByDesc('id')->get();

            return response()->json([
                'success' => true,
                'message' => 'Invoice list fetched successfully',
                'invoice_list' => $invoices,
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching invoices',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request){
        try{
            $validated = $request->validate([
                'invoice_no' => 'nullable|string|max:255|unique:invoices,invoice_no',
                'invoice_date' => 'required|date',
                'invoiceItems' => 'required|array|min:1',
                
                'invoiceItems.*.product_id' => 'required|integer|exists:products,id',
                'invoiceItems.*.quantity' => 'required|integer|min:1',
                'invoiceItems.*.unit_price' => 'required|numeric|min:1',
                'invoiceItems.*.discount_type' => 'nullable|string|in:fixed,percent',
                'invoiceItems.*.discount_value' => 'required|numeric|min:0',
                'invoiceItems.*.discount_amount' => 'required|numeric|min:0',
                'invoiceItems.*.line_total' => 'required|numeric|min:0',

                'subtotal' => 'required|numeric|min:0',
                'discount_type' => 'nullable|string|in:fixed,percent',
                'discount_value' => 'nullable|numeric|min:0',
                'discount_amount' => 'nullable|numeric|min:0',
                'grand_total' => 'nullable|numeric|min:0',
                'status' => 'nullable|string|in:draft,finalized,paid,cancelled'
            ]);

            DB::beginTransaction();

            if(empty($validated['invoice_no'])){
                $validated['invoice_no'] = $this->generateInvoiceNumber();
            }

            $invoice = Invoice::create([
                'invoice_no' => $validated['invoice_no'],
                'invoice_date' => $validated['invoice_date'],
                'subtotal' => $validated['subtotal'],
                'discount_type' => $validated['discount_type'] ?? null,
                'discount_value' => $validated['discount_value'],
                'discount_amount' => $validated['discount_amount'],
                'grand_total' => $validated['grand_total'],
                'status' => $validated['status'] ?? 'draft',
            ]);

            foreach($validated['invoiceItems'] as $itemData){
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

            if($invoice->status === 'finalized'){
                $this->createStockMovements($invoice);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Invoice created successfully.',
                'data' => $invoice->load(['invoiceItems.product.category']),
            ]);
        }catch(ValidationException $e){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while creating invoice',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function createStockMovements(Invoice $invoice){
        foreach($invoice->invoiceItems as $item){

            $product = Product::findOrFail($item->product_id);

            if($product->stock_qty < $item->quantity){
                throw new Exception("Insufficient stock for product: {$product->name}. Available: {$product->stock_qty}, Required: {$item->quantity}");
            }

            StockMovement::create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'type' => 'OUT',
                'note' => "Stock OUT for invoice #{$invoice->invoice_no}",
                'invoice_id' => $invoice->id,
            ]);

            $product->stock_qty -= $item->quantity;
            $product->save();
        }
    }

    public function show(Request $request, int $id){
        try{
            $invoice = Invoice::with(['invoiceItems.product.category'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Invoice fetched successfully',
                'invoice_data' => $invoice,
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching invoice',
                'errors' => $e->getMessage(),
            ], 500);
        }
     
    }

    public function update(Request $request, int $id){
        try{
            $invoice = Invoice::with(['invoiceItems'])->findOrFail($id);
            
            if($invoice->status === 'finalized'){
                return response()->json([
                    'success' => false,
                    'message' => 'Finalized invoice not editable to update'
                ], 400);
            }

            $validated = $request->validate([
                'invoice_no' => 'sometimes|required|string|max:255|unique:invoices,invoice_no,' . $invoice->id,
                'invoice_date' => 'sometimes|required|date',
                'invoiceItems' => 'sometimes|required|array|min:1',

                'invoiceItems.*.product_id' => 'required|integer|exists:products,id',
                'invoiceItems.*.quantity' => 'required|integer|min:1',
                'invoiceItems.*.unit_price' => 'required|numeric|min:0',
                'invoiceItems.*.discount_type' => 'nullable|string|in:fixed,percent',
                'invoiceItems.*.discount_value' => 'required|numeric|min:0',
                'invoiceItems.*.discount_amount' => 'required|numeric|min:0',
                'invoiceItems.*.line_total' => 'required|numeric|min:0',

                'subtotal' => 'sometimes|required|numeric|min:0',
                'discount_type' => 'nullable|string|in:fixed,percent',
                'discount_value' => 'sometimes|numeric|min:0',
                'discount_amount' => 'sometimes|numeric|min:0',
                'grand_total' => 'sometimes|required|numeric|min:0',
                'status' => 'sometimes|string|in:draft,finalized,cancelled'
            ]);

            DB::beginTransaction();

            $oldStatus = $invoice->status;

            if(isset($validated['invoiceItems'])){
                $invoice->invoiceItems()->delete();

                foreach($validated['invoiceItems'] as $itemData){
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
            
            $newStatus = $validated['status'] ?? $invoice->status;
            if($oldStatus !== 'finalized' && $newStatus === 'finalized'){
                $this->createStockMovements($invoice->fresh());
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Invoice updated successfully',
            ], 200);

        }catch(ValidationException $e){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating invoice',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(Request $request, int $id){
        try{
            $invoice = Invoice::findOrFail($id);

            if($invoice->status === 'finalized'){
                return response()->json([
                    'success' => false,
                    'message' => 'Finalzied invoice can not be deleted',
                ], 400);
            }

            DB::beginTransaction();

            $invoice->invoiceItems()->delete();
            $invoice->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Invoice deleted successfully',
            ], 200);
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while deleting invoice',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function generateInvoiceNumber(){
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');

        $lastInvoice = Invoice::where('invoice_no', 'like', "INV-{$year}-{$month}%")->latest('id')->first();
        
        if($lastInvoice){
            $sequence = (int) substr($lastInvoice->invoice_no, -4);
            $sequence ++;
        }else{
            $sequence = 1;
        } 

        return sprintf('INV-%s-%s-%04d', $year, $month, $sequence);
    }
}
