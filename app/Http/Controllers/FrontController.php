<?php

namespace App\Http\Controllers;

use App\Common\Definition\MealType;
use App\Common\Definition\OrderStatus;
use App\Models\CalaCustomer;
use App\Models\CalaOrder;
use App\Models\Food;
use App\Models\Menu;
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

    public function customerDeliveryOrders(int $customerId): View
    {
        $customer = CalaCustomer::find($customerId);
        $orders = CalaOrder::with(['customer', 'products'])
            ->where('customer_id', $customerId)
            ->where('status', OrderStatus::Delivered)
            ->orderBy('delivery_date', 'asc')
            ->get();
        return view('front.cala.delivery-orders', compact(
            'customer',
            'orders'
        ));
    }

    public function home(): View
    {
        $lastestMenu = Menu::orderBy('menu_id', 'desc')->limit(6)->get();
        $lastestFood = Food::orderBy('food_id', 'desc')->limit(24)->get();
        $favoriteMenu = Menu::orderBy('total_view', 'desc')->limit(4)->get();
        $favoriteFood = Food::orderBy('total_view', 'desc')->limit(3)->get();
        return view('front.home', [
            'mealTypes' => MealType::all(),
            'lastestFood' => $lastestFood,
            'lastestMenu' => $lastestMenu,
            'favoriteMenu' => $favoriteMenu,
            'favoriteFood' => $favoriteFood,
        ]);
    }
}
