<?php

namespace App\Http\Controllers\Admin\Cala;

use App\Common\Definition\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\CalaCustomer;
use App\Models\CalaOrder;
use App\Models\CalaProduct;
use App\Services\Cala\Order\OrderFinder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CalaHomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        $totalOrder = CalaOrder::where('status', OrderStatus::Completed->value)->count();
        $totalProduct = CalaProduct::count();
        $totalCustomer = CalaCustomer::count();
        $newOrders = CalaOrder::with(['customer', 'products'])->whereIn('status', [
            OrderStatus::Pending,
            OrderStatus::Doing,
            OrderStatus::Done,
            OrderStatus::Delivered
        ])->orderBy('delivery_date', 'asc')->get();
        $pendingOrders = [];
        $doingOrders = [];
        $doneOrders = [];
        $deliveredOrders = [];
        foreach ($newOrders as $order) {
            if (in_array($order->status, [OrderStatus::Pending])) {
                $pendingOrders[] = $order;
            }
            if (in_array($order->status, [OrderStatus::Doing])) {
                $doingOrders[] = $order;
            }
            if (in_array($order->status, [OrderStatus::Done])) {
                $doneOrders[] = $order;
            }
            if (in_array($order->status, [OrderStatus::Delivered])) {
                $deliveredOrders[] = $order;
            }
        }
        return view('admin.cala.home', compact(
            'totalOrder',
            'totalProduct',
            'totalCustomer',
            'newOrders',
            'pendingOrders',
            'doingOrders',
            'doneOrders',
            'deliveredOrders'
        ));
    }

    public function updateOrderStatus(Request $request)
    {
        $orderId = !empty($request->order_id) ? $request->order_id : '';
        $status = isset($request->status) ? (int)$request->status : '';
        $newStatus = '';
        if (!empty($orderId) && $status !== '') {
            $order = CalaOrder::find($orderId);
            if (!empty($order)) {
                if (in_array($status, [OrderStatus::Pending->value])) {
                    $order->status = OrderStatus::Doing->value;
                }
                if (in_array($status, [OrderStatus::Doing->value])) {
                    $order->status = OrderStatus::Done->value;
                }
                if (in_array($status, [OrderStatus::Done->value])) {
                    $order->status = OrderStatus::Delivered->value;
                    $order->shipping_date = date('Y-m-d');
                }
                if (in_array($status, [OrderStatus::Delivered->value])) {
                    $order->status = OrderStatus::Completed->value;
                    $order->paid_date = date('Y-m-d');
                }
                $order->save();
                $newStatus = $order->status;
            }
        }
        echo json_encode([
            'status' => 'OK',
            'new_status' => $newStatus
        ]);
        die();
    }
}
