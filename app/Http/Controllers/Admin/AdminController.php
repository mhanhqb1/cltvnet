<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function check(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:30'
        ]);
        $params = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($params)) {
            return redirect()->route('admin.admin.dashboard');
        } else {
            return redirect()->route('admin.admin.login')->with('fail', 'Somthing went wrong');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.admin.login');
    }
}
