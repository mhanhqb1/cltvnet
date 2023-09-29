<?php

namespace App\Http\Controllers;

use App\Models\HomeCompany;
use App\Models\HomeFeedback;
use App\Models\HomeHeader;
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
        $posts = Post::front_get_list([
            'limit' => 3,
            'page' => 1,
            'type' => Post::$postTypes['post']
        ]);
        $products = Post::front_get_list([
            'limit' => 5,
            'page' => 1,
            'type' => Post::$postTypes['product'],
            'home' => 1,
            'sort' => 'priority-desc'
        ]);
        $feedback = [];//HomeFeedback::get();
        $solutions = [];//HomeSolution::get();
        $services = HomeService::orderBy('priority', 'desc')->get();
        $topSliders = HomeTopSlider::orderBy('priority', 'desc')->get();
        $topLogos = HomeCompany::orderBy('priority', 'desc')->get();
        $topBanner = HomeTopBanner::first();
        $topHeaders = HomeHeader::pluck('value', 'name')->toArray();
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
            'topLogos',
            'topHeaders'
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

    public function danhChoDaiLy()
    {
        $name = 'danh_cho_dai_ly';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }

    public function huongDanMuaHang()
    {
        $name = 'huong_dan_mua_hang';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }

    public function hinhThucThanhToan()
    {
        $name = 'hinh_thuc_thanh_toan';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }

    public function doiDiemThuong()
    {
        $name = 'doi_diem_thuong';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }

    public function chinhSachBaoMat()
    {
        $name = 'chinh_sach_bao_mat';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }

    public function chinhSachBaoHanh()
    {
        $name = 'chinh_sach_bao_hanh';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }

    public function chinhSachVanChuyenLapDat()
    {
        $name = 'chinh_sach_van_chuyen_lap_dat';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }

    public function chinhSachDoiTraHoanTien()
    {
        $name = 'chinh_sach_doi_tra_hoan_tien';
        $pageTitle = __(StaticPage::$pages[$name]);
        $page = StaticPage::where('name', $name)->first();
        return view('front.home.static_page', compact(
            'pageTitle',
            'name',
            'page'
        ));
    }
}
