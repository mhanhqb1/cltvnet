<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Setting;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = 'Liên Hệ';
        return view('front.contact.index', compact('pageTitle'));
    }
    public function save(Request $request)
    {
        $setting = Setting::where('name', 'web_email')->first();
        $name = !empty($request->name) ? $request->name : '';
        $phone = !empty($request->phone) ? $request->phone : '';
        $email = !empty($request->email) ? $request->email : '';
        $message = !empty($request->message) ? $request->message : '';
        $mailData = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'message' => $message
        ];
        Contact::create($mailData);
        Mail::to($setting->value)->send(new SendMail($mailData));
        echo 'success'; exit();
        return redirect()->route('front.contact.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
    }
}
