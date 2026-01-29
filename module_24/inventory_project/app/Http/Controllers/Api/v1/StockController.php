<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StockController extends Controller
{
    public function index(){
        try{
            $stockMovements = StockMovement::with("product.category")->orderByDesc("id")->get();

            return response()->json([
                "success" => true,
                "message" => "Stock movements list fetched successfully",
                'stock-movements-data' => $stockMovements
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'success'=> false,
                'message'=> "Something went wrong while fetching stock movements"
            ], 500) ;
        }
    }

    public function stockIn(Request $request){
        try{  
            $validated = $request->validate([
                "product_id" => ["required","integer", "exists:products,id"],
                "quantity"=> ["required","integer","min:1"],
                "note"=> ["nullable","string"],
            ]);

            DB::beginTransaction();
            
            $stockMovement = StockMovement::create([
                "product_id"=> $validated["product_id"],
                "quantity"=> $validated["quantity"],
                "type" => "IN",
                'note' => $validated['note'] ?? null
            ]);

            $product = Product::findOrFail($validated['product_id']);
            
            // $oldStock = $product->stock_qty;
            // $updatedStock = $oldStock + $validated['quantity'];
            // $product->stock_qty = $updatedStock;
            // $product->save();

            $product->stock_qty += $validated['quantity'];
            $product->save();

            DB::commit();

            return response()->json([
                'success'=> true,
                "message" => "Stock IN movement recorded successfully",
                "stockMovements-data"=> $stockMovement,
            ], 201);

        }catch(ValidationException $e){
            return response()->json([
                "success"=> false,
                "message"=> "validation error",
                "errors"=> $e->errors()
            ], 422);
        }catch(\Throwable $e){
            DB::rollBack();
            return response()->json([
                "success"=> false,
                "message" => "something went wrong while recording stock IN",
                "errors" => $e->getMessage()
            ], 500);
        }
    }

    public function stockAdjustment(Request $request){
        try{
            $validated = $request->validate([
                "product_id"=> ["required","integer", 'exists:products,id'],
                'quantity'=> ['required','integer', 'min:1'],
                'type' => ['required', 'string', 'in:IN,OUT'],
                'note'=> ['nullable','string'],
                'invoice_id'=> ['nullable','integer', 'exists:invoices,id'],
            ]);

            DB::beginTransaction();

            $stockMovement = StockMovement::create([
                'product_id'=> $validated['product_id'],
                'quantity'=> $validated['quantity'],
                'type' => $validated['type'], 
                'note'=> $validated['note'],
                'invoice_id'=> $validated['invoice_id'] ?? null,
            ]);

            // update product stock quantity based on adjustment type
            $product = Product::findOrFail($validated['product_id']);
            
            if($validated['type'] === 'IN'){
                $product->stock_qty += $validated['quantity'];
            }else{
                if($product->stock_qty < $validated['quantity']){
                    DB::rollBack();
                    return response()->json([
                        'success'=> false,
                        'message'=> 'Insufficient stock for OUT adjustment',
                    ], 400);
                }
                $product->stock_qty -= $validated['quantity'];
            }
            $product->save();
            DB::commit();

            return response()->json([
                'success'=> true,
                'message'=> 'Stock adjustment recorded successfully',
                'data' => $stockMovement,
                'current_stock' => $product->stock_qty,
            ], 201);

        }catch(ValidationException $e){ 
            return response()->json([
                'success'=> false,
                'message'=> 'Validation error',
                'errors' => $e->errors(),
            ], 422);

        }catch(\Throwable $e){
            DB::rollBack();
            return response()->json([
                'success'=> false,
                'message'=> "Something went wrong while recording stock adjustment",
                "errors" => $e->getMessage(), 
            ], 500) ;
        }
    }
}
