<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function summery(){
        try {
            $totalCategory = Category::count();
            $totalProducts = Product::count();
            $totalInvoices = Invoice::count();
            $totalRevenue = Invoice::where('status', 'finalized')->sum('grand_total');

            $lowStockAlerts = Product::with('category')->whereColumn('stock_qty', '<=', 'low_stock_threshold')
                ->where('low_stock_threshold', '>', 0)->orderBy('stock_qty')->get();

            return response()->json([
                'success' => true,
                'message' => 'Dashboard summery fetched successfully.',
                'summery' => [
                    'total_categories' => $totalCategory,
                    'total_products' => $totalProducts,
                    'total_invoice' => $totalInvoices,
                    'total_revenue' => $totalRevenue,
                    'low_stock_threshold' => $lowStockAlerts,
                ],
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching dashboard summery.',
            ], 500);
        }
    }
}
