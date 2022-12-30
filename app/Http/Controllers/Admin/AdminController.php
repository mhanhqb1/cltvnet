<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function detail() {
        $item = Auth::guard('admin')->user();
        return view('admin.profile', compact('item'));
    }

    public function save(Request $request) {
        $admin = Auth::guard('admin')->user();
        $name = !empty($request->name) ? $request->name : $admin->name;
        $item = Admin::find($admin->id);
        $item->name = $name;
        if (!empty($request->new_pass)) {
            $item->password = Hash::make($request->new_pass);
        }
        $item->save();
        return redirect()->route('admin.admin.detail')->with('success', 'Dữ liệu đã được cập nhật thành công');
    }
}
