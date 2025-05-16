<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $user = auth('admin')->user();
        $userName = $user->name;
        $movies = Movie::where('is_series', 1)
            ->where('danfra_new_chapter', '>', 'new_chapter');
        if ($userName != 'admin') {
            $movies = $movies->where('user_id', $user->id);
        }
        $movies = $movies->get();
        return view('admin.home', compact(
            'movies'
        ));
    }
}
