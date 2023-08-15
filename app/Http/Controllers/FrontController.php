<?php

namespace App\Http\Controllers;

use App\Common\Definition\OrderStatus;
use App\Models\CalaCustomer;
use App\Models\CalaOrder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function customerPendingOrders(int $customerId): View
    {
        $customer = CalaCustomer::find($customerId);
        $orders = CalaOrder::with(['customer', 'products'])
            ->where('customer_id', $customerId)
            ->whereNotIn('status', [
                OrderStatus::Delivered,
                OrderStatus::Paid,
                OrderStatus::Completed
            ])
            ->orderBy('delivery_date', 'asc')
            ->get();
        return view('front.cala.pending-orders', compact(
            'customer',
            'orders'
        ));
    }
}
