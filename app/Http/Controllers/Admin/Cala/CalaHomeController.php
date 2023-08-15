<?php

namespace App\Http\Controllers\Admin\Cala;

use App\Common\Definition\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\CalaCustomer;
use App\Models\CalaOrder;
use App\Models\CalaProduct;
use App\Services\Cala\Order\OrderFinder;
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
            OrderStatus::Pending->value,
            OrderStatus::Doing->value,
        ])->orderBy('delivery_date', 'asc')->get();
        return view('admin.cala.home', compact(
            'totalOrder',
            'totalProduct',
            'totalCustomer',
            'newOrders'
        ));
    }
}
