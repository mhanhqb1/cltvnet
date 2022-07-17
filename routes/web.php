<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatesController;
use App\Http\Controllers\Admin\MoviesController;
use App\Http\Controllers\Admin\PostController;
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
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin'])->group(function() {
        Route::view('/', 'admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        // Post
        Route::get('/posts', [PostController::class, 'index'])->name('post.index');
        Route::get('/posts/indexData', [PostController::class, 'indexData'])->name('post.indexData');

        // Movie
        Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
        Route::get('/movies/indexData', [MoviesController::class, 'indexData'])->name('movies.indexData');
        Route::get('/movies/add', [MoviesController::class, 'add'])->name('movies.add');
        Route::get('/movies/edit/{id}', [MoviesController::class, 'edit'])->name('movies.edit');
        Route::post('/movies/save', [MoviesController::class, 'save'])->name('movies.save');
        Route::delete('/movies/{id}', [MoviesController::class, 'delete'])->name('movies.delete');

        // Cate
        Route::get('/cates', [CatesController::class, 'index'])->name('cates.index');
        Route::get('/cates/indexData', [CatesController::class, 'indexData'])->name('cates.indexData');
        Route::get('/cates/add', [CatesController::class, 'add'])->name('cates.add');
        Route::get('/cates/edit/{id}', [CatesController::class, 'edit'])->name('cates.edit');
        Route::post('/cates/save', [CatesController::class, 'save'])->name('cates.save');
        Route::delete('/cates/{id}', [CatesController::class, 'delete'])->name('cates.delete');
    });
});
