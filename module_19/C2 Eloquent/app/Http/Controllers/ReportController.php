<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Payment;

class ReportController extends Controller
{
    public function summery( Request $request){
        $from = $request->query('from');
        $to = $request->query('to');

        if(!$from  || !$to){
            $to = now()->toDateString();
            $from = now()->subDays(30)->toDateString();
        }

        //  Base Query
        $ordersQuery = Order::query()->betweenDates($from, $to);

        $totalCustomer = Customer::count();
        $totalOrders = (clone $ordersQuery)->count();
        $totalRevenue = (clone $ordersQuery)->sum('grand_total');

        $totalPaid = Payment::whereHas('order', function ($query) use ($from, $to) {
            $query->betweenDates($from, $to);
        })->sum('amount');
        
        $totalDue = $totalRevenue - $totalPaid;

        $revenueByStatus = (clone $ordersQuery)
            ->selectRaw('status, COUNT(*) as total_orders, SUM(grand_total) as total_revenue')
            ->groupBy('status')
            ->get();

        return response()->json([
            'total_customers' => $totalCustomer,
            'total_orders' => $totalOrders,
            'total_revenue' => $totalRevenue,
            'total_paid' => $totalPaid,
            'total_due' => $totalDue,
            'revenue_by_status' => $revenueByStatus
        ]);
    }
}
