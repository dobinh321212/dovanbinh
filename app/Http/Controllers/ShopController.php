<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    //Trang chủ
    public function index()
    {
        return view('shops.index');
    }
    //Trang liên hệ
    public function contact()
    {
        return view('shops.contact');
    }

    //Trang danh sách sản phẩm
    public function listProducts()
    {
        return view('shops.list-products');
    }
    //Trang chi tiết sản phẩm
    public function detailProduct()
    {
        return view('shops.detail-products');
    }
    //Trang Tin Tức
    public function listArticles()
    {
        return view('shops.list-articles');

    }
    //Trang chi tiết tin tức
    public function detailArticle()
    {
        return view('shops.detail-article');
    }
}
