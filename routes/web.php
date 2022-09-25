<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatesController;
use App\Http\Controllers\Admin\MoviesController;
use App\Http\Controllers\Admin\KidController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\DailymotionController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tim-kiem', [App\Http\Controllers\HomeController::class, 'search'])->name('home.search');
Route::get('/the-loai/{slug}', [App\Http\Controllers\HomeController::class, 'cateIndex'])->name('home.cate.index');
Route::get('/quoc-gia/{slug}', [App\Http\Controllers\HomeController::class, 'countryIndex'])->name('home.country.index');
Route::get('/phim-hoat-hinh', [App\Http\Controllers\HomeController::class, 'getAnime'])->name('home.anime');
Route::get('/phim-le', [App\Http\Controllers\HomeController::class, 'getNotSeries'])->name('home.not_series');
Route::get('/phim-bo', [App\Http\Controllers\HomeController::class, 'getSeries'])->name('home.series');
Route::get('/phim-moi', [App\Http\Controllers\HomeController::class, 'getNewMovies'])->name('home.new_movie');
Route::get('/phim/{movieSlug}', [App\Http\Controllers\HomeController::class, 'getMovieDetail'])->name('home.movie_detail');
Route::get('/phim/{movieSlug}/{videoSlug}', [App\Http\Controllers\HomeController::class, 'getVideoDetail'])->name('home.video_detail');
Route::get('/dailymotion', [App\Http\Controllers\HomeController::class, 'dailymotion'])->name('home.dailymotion');
Route::get('/video/{movieSlug}', [App\Http\Controllers\HomeController::class, 'getMovieDetail2'])->name('home.movie_detail2');
Route::get('/video/{movieSlug}/{videoSlug}', [App\Http\Controllers\HomeController::class, 'getVideoDetail2'])->name('home.video_detail2');
Route::get('/okru', [App\Http\Controllers\HomeController::class, 'okru'])->name('home.okru');

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

        // Movie videos
        Route::get('/movieVideos/add', [MoviesController::class, 'addVideo'])->name('movies.addVideo');
        Route::get('/movieVideos/edit/{id}', [MoviesController::class, 'editVideo'])->name('movies.editVideo');
        Route::post('/movieVideos/save', [MoviesController::class, 'saveVideo'])->name('movies.saveVideo');
        Route::get('/movieVideos/indexData', [MoviesController::class, 'indexDataVideo'])->name('movies.indexDataVideo');
        Route::delete('/moviesVideos/{id}', [MoviesController::class, 'deleteVideo'])->name('movies.deleteVideo');

        // Kid
        Route::get('/kid', [KidController::class, 'index'])->name('kid.index');
        Route::get('/kid/indexData', [KidController::class, 'indexData'])->name('kid.indexData');
        Route::get('/kid/add', [KidController::class, 'add'])->name('kid.add');
        Route::get('/kid/edit/{id}', [KidController::class, 'edit'])->name('kid.edit');
        Route::post('/kid/save', [KidController::class, 'save'])->name('kid.save');
        Route::delete('/kid/{id}', [KidController::class, 'delete'])->name('kid.delete');

        // Kid videos
        Route::get('/kidVideos/add', [KidController::class, 'addVideo'])->name('kid.addVideo');
        Route::get('/kidVideos/edit/{id}', [KidController::class, 'editVideo'])->name('kid.editVideo');
        Route::post('/kidVideos/save', [KidController::class, 'saveVideo'])->name('kid.saveVideo');
        Route::get('/kidVideos/indexData', [KidController::class, 'indexDataVideo'])->name('kid.indexDataVideo');
        Route::delete('/kidVideos/{id}', [KidController::class, 'deleteVideo'])->name('kid.deleteVideo');

        // Cate
        Route::get('/cates', [CatesController::class, 'index'])->name('cates.index');
        Route::get('/cates/indexData', [CatesController::class, 'indexData'])->name('cates.indexData');
        Route::get('/cates/add', [CatesController::class, 'add'])->name('cates.add');
        Route::get('/cates/edit/{id}', [CatesController::class, 'edit'])->name('cates.edit');
        Route::post('/cates/save', [CatesController::class, 'save'])->name('cates.save');
        Route::delete('/cates/{id}', [CatesController::class, 'delete'])->name('cates.delete');

        // Cate
        Route::get('/countries', [CountriesController::class, 'index'])->name('countries.index');
        Route::get('/countries/indexData', [CountriesController::class, 'indexData'])->name('countries.indexData');
        Route::get('/countries/add', [CountriesController::class, 'add'])->name('countries.add');
        Route::get('/countries/edit/{id}', [CountriesController::class, 'edit'])->name('countries.edit');
        Route::post('/countries/save', [CountriesController::class, 'save'])->name('countries.save');
        Route::delete('/countries/{id}', [CountriesController::class, 'delete'])->name('countries.delete');

        // Cate
        Route::get('/dailymotion', [DailymotionController::class, 'index'])->name('dailymotion.index');
        Route::get('/dailymotion/indexData', [DailymotionController::class, 'indexData'])->name('dailymotion.indexData');
        Route::get('/dailymotion/add', [DailymotionController::class, 'add'])->name('dailymotion.add');
        Route::get('/dailymotion/edit/{id}', [DailymotionController::class, 'edit'])->name('dailymotion.edit');
        Route::post('/dailymotion/save', [DailymotionController::class, 'save'])->name('dailymotion.save');
        Route::delete('/dailymotion/{id}', [DailymotionController::class, 'delete'])->name('dailymotion.delete');
    });
});
