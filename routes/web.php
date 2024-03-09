<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TiktoksController;
use App\Http\Controllers\Admin\TiktokVideosController;
use App\Http\Controllers\Api\TiktokApiController;
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

Route::get('/', [HomeController::class, 'index'])->name('front.home.index');
Route::get('/lien-he', [FrontContact::class, 'index'])->name('front.contact.index');
Route::post('/lien-he', [FrontContact::class, 'save'])->name('front.contact.save');
Route::get('/bai-viet', [FrontPost::class, 'index'])->name('front.post.index');
Route::get('/bai-viet/{slug}', [FrontPost::class, 'detail'])->name('front.post.detail');

Route::prefix('api')->name('api.')->group(function(){
    Route::middleware([])->group(function(){
        Route::get('/tiktoks', [TiktokApiController::class, 'index'])->name('tiktoks.index');
        Route::post('/tiktoks', [TiktokApiController::class, 'update'])->name('tiktoks.update');
    });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'user.login')->name('login.index');
        Route::view('/register', 'user.register')->name('register.index');
        Route::post('/create', [UserController::class, 'create'])->name('create.index');
        Route::post('/check', [UserController::class, 'check'])->name('check.index');
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home.index');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout.index');
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

        // Setting
        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::post('/setting/save', [SettingController::class, 'save'])->name('setting.save');

        // Tiktok
        Route::prefix('tiktoks')->name('tiktoks.')->group(function() {
            Route::get('/', [TiktoksController::class, 'index'])->name('index');
            Route::get('/indexData', [TiktoksController::class, 'indexData'])->name('indexData');
            Route::get('/add', [TiktoksController::class, 'add'])->name('add');
            Route::get('/update/{id}', [TiktoksController::class, 'update'])->name('update');
            Route::post('/save', [TiktoksController::class, 'save'])->name('save');
            Route::delete('/{id}', [TiktoksController::class, 'delete'])->name('delete');
        });

        // Tiktok videos
        Route::prefix('tiktok/videos')->name('tiktok_videos.')->group(function() {
            Route::get('/', [TiktokVideosController::class, 'index'])->name('index');
            // Route::get('/indexData', [TiktoksController::class, 'indexData'])->name('indexData');
            // Route::get('/add', [TiktoksController::class, 'add'])->name('add');
            // Route::get('/update/{id}', [TiktoksController::class, 'update'])->name('update');
            // Route::post('/save', [TiktoksController::class, 'save'])->name('save');
            // Route::delete('/{id}', [TiktoksController::class, 'delete'])->name('delete');
        });
    });
});
