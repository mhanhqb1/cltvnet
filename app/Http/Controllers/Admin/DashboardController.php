<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $postCount = Post::where('type', Post::$postTypes['post'])->count();
        $productCount = Post::where('type', Post::$postTypes['product'])->count();
        $contactCount = Contact::count();
        $settingCount = Setting::count();
        return view('admin.dashboard.index', compact(
            'postCount',
            'contactCount',
            'settingCount',
            'productCount'
        ));
    }
}
