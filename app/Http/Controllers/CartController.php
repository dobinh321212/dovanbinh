<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Setting;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        // lấy dữ liệu setting và chia sẻ global
        // 4. cấu hình website
        $settings = Setting::first();

        // Chia sẻ dữ qua tất các layout
        view()->share([
            'settings' => $settings
        ]);
    }
    public function index()
    {
        return view('shops.cart.index');
    }
    public function checkout()
    {
        return view('shops.cart.checkout');
    }
    public function postContact(Request $request)
    {
//        //validate
//        $request->validate([
//            'name' => 'required|max:255',
//            'email' => 'required|email'
//        ]);

        //luu vào csdl
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');
        $contact->save();

        // chuyển về trang chủ
        return redirect('/');
    }
    }
