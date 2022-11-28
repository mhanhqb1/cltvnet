<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.contact.index');
    }
    public function save(Request $request)
    {
        $contact = new Contact();
        $contact->name = !empty($request->name) ? $request->name : '';
        $contact->phone = !empty($request->phone) ? $request->phone : '';
        $contact->email = !empty($request->email) ? $request->email : '';
        $contact->message = !empty($request->message) ? $request->message : '';
        $contact->save();
        echo 'success'; exit();
        return redirect()->route('front.contact.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
    }
}
