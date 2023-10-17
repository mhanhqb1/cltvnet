<?php

namespace App\Http\Controllers;

use App\Common\Definition\CateType;
use App\Common\Definition\MealType;
use App\Common\Definition\OrderStatus;
use App\Models\CalaCustomer;
use App\Models\CalaOrder;
use App\Models\Cate;
use App\Models\Food;
use App\Models\FoodArticle;
use App\Models\FoodRecipe;
use App\Models\FoodVideo;
use App\Models\Ingredient;
use App\Models\IngredientCate;
use App\Models\Menu;
use App\Services\Food\FoodFinder;
use App\Services\Menu\MenuFinder;
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
        $lastestMenu = Menu::withCount('menuFoods')
            ->orderBy('menu_id', 'desc')
            ->limit(6)
            ->get();
        $lastestFood = Food::orderBy('food_id', 'desc')
            ->limit(24)
            ->get();
        $favoriteMenu = Menu::orderBy('total_view', 'desc')
            ->limit(4)
            ->get();
        $favoriteFood = Food::orderBy('total_view', 'desc')
            ->limit(3)
            ->get();
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

    public function getFoodByIngredient(string $slug, FoodFinder $foodFinder): View
    {
        $cate = Cate::where('slug', $slug)->where('type', CateType::Ingredient->value)->first();
        $ingredientIds = IngredientCate::where('cate_id', $cate->cate_id)
            ->pluck('ingredient_id')
            ->toArray();
        $foods = $foodFinder->getPaginator([
            'ingredient_ids' => $ingredientIds
        ]);
        return view('front.foods.ingredient', [
            'foods' => $foods,
            'cate' => $cate,
        ]);
    }

    public function getFoodIndex(FoodFinder $foodFinder)
    {
        $foods = $foodFinder->getPaginator([]);
        return view('front.foods.index', [
            'foods' => $foods,
        ]);
    }

    public function getFoodDetail(string $slug)
    {
        $food = Food::where('slug', $slug)
            ->firstOrFail();
        $foodRecipes = FoodRecipe::with('ingredient')
            ->where('food_id', $food->food_id)
            ->get();
        $foodVideos = FoodVideo::where('food_id', $food->food_id)
            ->get();
        $foodArticles = FoodArticle::where('food_id', $food->food_id)
            ->get();
        $otherFoods = Food::where('food_id', '!=', $food->food_id)
            ->limit(8)
            ->get();
        return view('front.foods.detail', [
            'food' => $food,
            'otherFoods' => $otherFoods,
            'foodRecipes' => $foodRecipes,
            'foodVideos' => $foodVideos,
            'foodArticles' => $foodArticles,
        ]);
    }

    public function getMenuDetail(string $slug)
    {
        $menu = Menu::with(['foods'])
            ->where('slug', $slug)
            ->firstOrFail();
        $otherMenus = Menu::where('menu_id', '!=', $menu->menu_id)
            ->limit(8)
            ->get();
        return view('front.menu.detail', [
            'menu' => $menu,
            'otherMenus' => $otherMenus,
        ]);
    }

    public function getMenuRandom()
    {
        echo 'menu random';
        die();
    }

    public function getMenuIndex()
    {
        echo 'menu index';
        die();
    }

    public function getMenuByCate(string $cateSlug, MenuFinder $menuFinder): View
    {
        $cate = Cate::where('slug', $cateSlug)->first();
        $menus = $menuFinder->getPaginator([
            'cate_id' => $cate->cate_id
        ]);
        return view('front.menu.cate', [
            'menus' => $menus,
            'cate' => $cate,
        ]);
    }
}
