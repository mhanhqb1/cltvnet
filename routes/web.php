<?php

use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\NutritionController;
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

Route::get('/', function () {
    return view('welcome');
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
});
