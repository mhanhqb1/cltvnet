<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\ContactController as FrontContact;
use App\Http\Controllers\PostController as FrontPost;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
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
// Command
Route::get('/command/migrate', function () {
    Artisan::call('migrate');
});
Route::get('/command/install', function () {
    Artisan::call('migrate');
    Artisan::call('storage:link');
});
Route::get('/command/clearAll', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
});

Route::get('/flaticon', [HomeController::class, 'flaticon'])->name('front.home.flaticon');

Route::get('/', [HomeController::class, 'index'])->name('front.home.index');
Route::get('/gioi-thieu', [HomeController::class, 'aboutUs'])->name('front.home.about_us');
Route::get('/dieu-khoan-va-dich-vu', [HomeController::class, 'termAndServices'])->name('front.home.term_and_services');
Route::get('/lien-he', [FrontContact::class, 'index'])->name('front.contact.index');
Route::post('/lien-he', [FrontContact::class, 'save'])->name('front.contact.save');
Route::get('/bai-viet', [FrontPost::class, 'index'])->name('front.post.index');
Route::get('/bai-viet/{slug}', [FrontPost::class, 'detail'])->name('front.post.detail');
Route::get('/du-an', [FrontPost::class, 'productIndex'])->name('front.product.index');
Route::get('/du-an/{slug}', [FrontPost::class, 'productDetail'])->name('front.product.detail');
Route::get('/danh-muc/{slug}', [FrontPost::class, 'cateDetail'])->name('front.post.cate_detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'user.login')->name('login');
        Route::view('/register', 'user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::view('/home', 'user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::middleware(['guest:admin'])->group(function() {
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/check', [AdminController::class, 'check'])->name('admin.check');
    });

    Route::middleware(['auth:admin'])->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        // Post
        Route::get('/posts', [PostController::class, 'index'])->name('post.index');
        Route::get('/posts/indexData', [PostController::class, 'indexData'])->name('post.indexData');
        Route::get('/posts/add', [PostController::class, 'add'])->name('post.add');
        Route::get('/posts/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::post('/posts/save', [PostController::class, 'save'])->name('post.save');
        Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('post.delete');

        // Product
        Route::get('/products', [PostController::class, 'productIndex'])->name('product.index');
        Route::get('/products/add', [PostController::class, 'productAdd'])->name('product.add');
        Route::get('/products/update/{id}', [PostController::class, 'productUpdate'])->name('product.update');

        // Contact
        Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/contacts/indexData', [ContactController::class, 'indexData'])->name('contact.indexData');
        Route::delete('/contacts/{id}', [ContactController::class, 'delete'])->name('contact.delete');

        // Category
        Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/categories/indexData', [CategoryController::class, 'indexData'])->name('category.indexData');
        Route::get('/categories/add', [CategoryController::class, 'add'])->name('category.add');
        Route::get('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::post('/categories/save', [CategoryController::class, 'save'])->name('category.save');

        Route::get('/productcategories', [CategoryController::class, 'productIndex'])->name('product_category.index');
        Route::get('/productcategories/add', [CategoryController::class, 'productAdd'])->name('product_category.add');
        Route::get('/productcategories/update/{id}', [CategoryController::class, 'productUpdate'])->name('product_category.update');

        // Setting
        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::post('/setting/save', [SettingController::class, 'save'])->name('setting.save');

        // Page about us
        Route::get('/staticpage', [StaticPageController::class, 'index'])->name('static_page.index');
        Route::post('/staticpage/save', [StaticPageController::class, 'save'])->name('static_page.save');

        // HomePage Setting feedback
        Route::get('/setting/homefeedback', [SettingController::class, 'homeFeedbackIndex'])->name('setting.home_feedback_index');
        Route::get('/setting/homefeedback/indexData', [SettingController::class, 'homeFeedbackIndexData'])->name('setting.home_feedback_indexData');
        Route::get('/setting/homefeedback/add', [SettingController::class, 'homeFeedbackAdd'])->name('setting.home_feedback_add');
        Route::get('/setting/homefeedback/update/{id}', [SettingController::class, 'homeFeedbackUpdate'])->name('setting.home_feedback_update');
        Route::delete('/setting/homefeedback/{id}', [SettingController::class, 'homeFeedbackDelete'])->name('setting.home_feedback_delete');
        Route::post('/setting/homefeedback/save', [SettingController::class, 'homeFeedbackSave'])->name('setting.home_feedback_save');

        // HomePage Setting solution
        Route::get('/setting/homesolution', [SettingController::class, 'homeSolutionIndex'])->name('setting.home_solution_index');
        Route::get('/setting/homesolution/indexData', [SettingController::class, 'homeSolutionIndexData'])->name('setting.home_solution_indexData');
        Route::get('/setting/homesolution/add', [SettingController::class, 'homeSolutionAdd'])->name('setting.home_solution_add');
        Route::get('/setting/homesolution/update/{id}', [SettingController::class, 'homeSolutionUpdate'])->name('setting.home_solution_update');
        Route::delete('/setting/homesolution/{id}', [SettingController::class, 'homeSolutionDelete'])->name('setting.home_solution_delete');
        Route::post('/setting/homesolution/save', [SettingController::class, 'homeSolutionSave'])->name('setting.home_solution_save');

        // HomePage Setting service
        Route::get('/setting/homeservice', [SettingController::class, 'homeServiceIndex'])->name('setting.home_service_index');
        Route::get('/setting/homeservice/indexData', [SettingController::class, 'homeServiceIndexData'])->name('setting.home_service_indexData');
        Route::get('/setting/homeservice/add', [SettingController::class, 'homeServiceAdd'])->name('setting.home_service_add');
        Route::get('/setting/homeservice/update/{id}', [SettingController::class, 'homeServiceUpdate'])->name('setting.home_service_update');
        Route::delete('/setting/homeservice/{id}', [SettingController::class, 'homeServiceDelete'])->name('setting.home_service_delete');
        Route::post('/setting/homeservice/save', [SettingController::class, 'homeServiceSave'])->name('setting.home_service_save');

        // HomePage Setting top slider
        Route::get('/setting/topslider', [SettingController::class, 'topSliderIndex'])->name('setting.top_slider_index');
        Route::get('/setting/topslider/indexData', [SettingController::class, 'topSliderIndexData'])->name('setting.top_slider_indexData');
        Route::get('/setting/topslider/add', [SettingController::class, 'topSliderAdd'])->name('setting.top_slider_add');
        Route::get('/setting/topslider/update/{id}', [SettingController::class, 'topSliderUpdate'])->name('setting.top_slider_update');
        Route::delete('/setting/topslider/{id}', [SettingController::class, 'topSliderDelete'])->name('setting.top_slider_delete');
        Route::post('/setting/topslider/save', [SettingController::class, 'topSliderSave'])->name('setting.top_slider_save');
    });
});
