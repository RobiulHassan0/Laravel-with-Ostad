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
            $totalRevenue = Invoice::where('status', 'finalize')->sum('grand_total');

            return response()->json([
                'success' => true,
                'message' => 'Dashboard summery fetched successfully.',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching dashboard summery.',
            ], 500);
        }
    }
}
