<?php

namespace App\Http\Controllers;

use App\Models\HomeCompany;
use App\Models\HomeFeedback;
use App\Models\HomeService;
use App\Models\HomeSolution;
use App\Models\HomeTopBanner;
use App\Models\HomeTopSlider;
use App\Models\Post;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $posts = Post::front_get_list([
        //     'limit' => 3,
        //     'page' => 1,
        //     'type' => Post::$postTypes['post']
        // ]);
        $posts = [];
        $products = Post::front_get_list([
            'limit' => 3,
            'page' => 1,
            'type' => Post::$postTypes['product']
        ]);
        $feedback = [];//HomeFeedback::get();
        $solutions = [];//HomeSolution::get();
        $services = HomeService::get();
        $topSliders = HomeTopSlider::get();
        $topLogos = HomeCompany::get();
        $topBanner = HomeTopBanner::first();
        $pageTitle = __('Home');
        return view('front.home.index', compact(
            'posts',
            'pageTitle',
            'products',
            'feedback',
            'solutions',
            'services',
            'topSliders',
            'topBanner',
            'topLogos'
        ));
    }

    public function aboutUs()
    {
        $name = 'about_us';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }

    public function termAndServices ()
    {
        $name = 'term_and_services';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }

    public function flaticon()
    {
        return view('front.home.flaticon');
    }
}
