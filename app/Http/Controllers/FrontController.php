<?php

namespace App\Http\Controllers;

use App\Common\Definition\MealType;
use App\Common\Definition\OrderStatus;
use App\Models\CalaCustomer;
use App\Models\CalaOrder;
use App\Models\Cate;
use App\Models\Food;
use App\Models\Menu;
use App\Services\Food\FoodFinder;
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
            'lastestFood' => $lastestFood,
            'lastestMenu' => $lastestMenu,
            'favoriteMenu' => $favoriteMenu,
            'favoriteFood' => $favoriteFood,
        ]);
    }

    public function getFoodByMealType(string $mealTypeSlug, FoodFinder $foodFinder): View
    {
        $mealTypeId = MealType::findBySlug($mealTypeSlug);
        $foods = $foodFinder->getPaginator([
            'meal_type' => $mealTypeId
        ]);
        $mealType = MealType::all()[$mealTypeId];
        return view('front.foods.mealtype', [
            'foods' => $foods,
            'mealType' => $mealType,
        ]);
    }

    public function getFoodByCate(string $cateSlug, FoodFinder $foodFinder): View
    {
        $cate = Cate::where('slug', $cateSlug)->first();
        $foods = $foodFinder->getPaginator([
            'cate_id' => $cate->cate_id
        ]);
        return view('front.foods.cate', [
            'foods' => $foods,
            'cate' => $cate,
        ]);
    }
}
