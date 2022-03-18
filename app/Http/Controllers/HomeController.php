<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    /**
     * Homepage
     */
    public static function index() {
        return view('home.index');
    }

}
