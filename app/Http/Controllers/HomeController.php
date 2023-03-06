<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $songs = Music::with('album')->whereNotNull('mp3_source')->get();
        return view('front.home.index', compact('songs'));
    }
}
