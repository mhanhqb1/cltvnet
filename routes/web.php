<?php

use App\Http\Controllers\Admin\Cala\CalaCostOrderController;
use App\Http\Controllers\Admin\Cala\CalaCustomerController;
use App\Http\Controllers\Admin\Cala\CalaHomeController;
use App\Http\Controllers\Admin\Cala\CalaOrderController;
use App\Http\Controllers\Admin\Cala\CalaProductController;
use App\Http\Controllers\Admin\Cala\CalaTransporterController;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NutritionController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(FrontController::class)
    ->prefix('')
    ->name('front.')
    ->group(function() {
        Route::get('/', 'home')
            ->name('home');
        Route::name('foods.')
            ->group(function() {
                Route::get('/danh-sach-mon-an', 'getFoodIndex')
                    ->name('index');
                Route::get('/danh-muc/{slug}', 'getFoodByMealType')
                    ->name('mealtype');
                Route::get('/cach-nau/{slug}', 'getFoodByCate')
                    ->name('cate');
                Route::get('/mon-an/{slug}', 'getFoodDetail')
                    ->name('detail');
            });
        Route::name('menu.')
            ->group(function() {
                Route::get('/danh-sach-thuc-don', 'getMenuIndex')
                    ->name('index');
                Route::get('/loai-thuc-don/{slug}', 'getMenuByCate')
                    ->name('cate');
                Route::get('/thuc-don/{slug}', 'getMenuDetail')
                    ->name('detail');
                Route::get('/thuc-don-ngau-nhien', 'getMenuRandom')
                    ->name('random');
            });
        Route::name('ingredients.')
            ->group(function() {
                Route::get('/nguyen-lieu/{slug}', 'getFoodByIngredient')
                    ->name('detail');
            });
    });

Route::controller(FrontController::class)
            ->prefix('mecala')
            ->name('mecala.')
            ->group(function () {
                Route::get('/pending-orders/{customerId}', 'customerPendingOrders')
                    ->name('customerPendingOrders');
                Route::get('/delivery-orders/{customerId}', 'customerDeliveryOrders')
                    ->name('customerDeliveryOrders');
            });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::controller(NutritionController::class)
            ->prefix('nutritions')
            ->name('nutritions.')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('/create', 'create')
                    ->name('create');
                Route::get('/{nutritionId}/edit', 'edit')
                    ->name('edit');
                Route::put('/{nutritionId}', 'update')
                    ->name('update');
                Route::post('/', 'store')
                    ->name('store');
                Route::delete('/{nutritionId}', 'destroy')
                    ->name('destroy');
            });

        Route::controller(CateController::class)
            ->prefix('cates')
            ->name('cates.')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('/create', 'create')
                    ->name('create');
                Route::get('/{cateId}/edit', 'edit')
                    ->name('edit');
                Route::put('/{cateId}', 'update')
                    ->name('update');
                Route::post('/', 'store')
                    ->name('store');
                Route::delete('/{cateId}', 'destroy')
                    ->name('destroy');
            });

        Route::controller(IngredientController::class)
            ->prefix('ingredients')
            ->name('ingredients.')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('/create', 'create')
                    ->name('create');
                Route::get('/{cateId}/edit', 'edit')
                    ->name('edit');
                Route::put('/{cateId}', 'update')
                    ->name('update');
                Route::post('/', 'store')
                    ->name('store');
                Route::delete('/{cateId}', 'destroy')
                    ->name('destroy');
            });

        Route::controller(FoodController::class)
            ->prefix('foods')
            ->name('foods.')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('/create', 'create')
                    ->name('create');
                Route::get('/{foodId}/edit', 'edit')
                    ->name('edit');
                Route::put('/{foodId}', 'update')
                    ->name('update');
                Route::post('/', 'store')
                    ->name('store');
                Route::delete('/{foodId}', 'destroy')
                    ->name('destroy');
            });

        Route::controller(MenuController::class)
            ->prefix('menus')
            ->name('menus.')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');
                Route::get('/create', 'create')
                    ->name('create');
                Route::get('/{foodId}/edit', 'edit')
                    ->name('edit');
                Route::put('/{foodId}', 'update')
                    ->name('update');
                Route::post('/', 'store')
                    ->name('store');
                Route::delete('/{foodId}', 'destroy')
                    ->name('destroy');
            });

        Route::name('cala.')
            ->prefix('mecala')
            ->group(function () {
                Route::controller(CalaHomeController::class)
                    ->prefix('home')
                    ->name('home.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index');
                        Route::post('/update-order-status', 'updateOrderStatus')
                            ->name('updateOrderStatus');
                        Route::get('/sales', 'sales')
                            ->name('sales');
                    });
                Route::controller(CalaProductController::class)
                    ->prefix('products')
                    ->name('products.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index');
                        Route::get('/create', 'create')
                            ->name('create');
                        Route::get('/{productId}/edit', 'edit')
                            ->name('edit');
                        Route::put('/{productId}', 'update')
                            ->name('update');
                        Route::post('/', 'store')
                            ->name('store');
                        Route::delete('/{productId}', 'destroy')
                            ->name('destroy');
                    });
                Route::controller(CalaTransporterController::class)
                    ->prefix('transporters')
                    ->name('transporters.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index');
                        Route::get('/create', 'create')
                            ->name('create');
                        Route::get('/{transporterId}/edit', 'edit')
                            ->name('edit');
                        Route::put('/{transporterId}', 'update')
                            ->name('update');
                        Route::post('/', 'store')
                            ->name('store');
                        Route::delete('/{transporterId}', 'destroy')
                            ->name('destroy');
                    });
                Route::controller(CalaCustomerController::class)
                    ->prefix('customers')
                    ->name('customers.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index');
                        Route::get('/create', 'create')
                            ->name('create');
                        Route::get('/{customerId}/edit', 'edit')
                            ->name('edit');
                        Route::put('/{customerId}', 'update')
                            ->name('update');
                        Route::post('/', 'store')
                            ->name('store');
                        Route::delete('/{customerId}', 'destroy')
                            ->name('destroy');
                    });
                Route::controller(CalaOrderController::class)
                    ->prefix('orders')
                    ->name('orders.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index');
                        Route::get('/create', 'create')
                            ->name('create');
                        Route::get('/{orderId}/edit', 'edit')
                            ->name('edit');
                        Route::put('/{orderId}', 'update')
                            ->name('update');
                        Route::post('/', 'store')
                            ->name('store');
                        Route::delete('/{orderId}', 'destroy')
                            ->name('destroy');
                    });
                Route::controller(CalaCostOrderController::class)
                    ->prefix('cost-orders')
                    ->name('cost_orders.')
                    ->group(function () {
                        Route::get('/', 'index')
                            ->name('index');
                        Route::get('/create', 'create')
                            ->name('create');
                        Route::get('/{costOrderId}/edit', 'edit')
                            ->name('edit');
                        Route::put('/{costOrderId}', 'update')
                            ->name('update');
                        Route::post('/', 'store')
                            ->name('store');
                        Route::delete('/{costOrderId}', 'destroy')
                            ->name('destroy');
                    });
            });
});
