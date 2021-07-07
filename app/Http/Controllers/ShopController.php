<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Contact;
use App\Product;
use App\Setting;
use App\Articles;
use App\Vendor;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $categories; //lưu danh sách danh mục
    public function __construct()
    {
        // 1. Lấy dữ liệu - Danh mục, có trạng thái là hiển thị
        $categories = Category::where([
            'is_active' => 1,
            'type' => 1,//lấy danh mục sản phẩm
             ])->get();// bao gồm cả menu cha và con
        $this->categories = $categories;

        // 2. Lấy dữ liệu - Banner
        $banners = Banner::where('is_active', 1)->orderBy('id', 'desc')
            ->orderBy('position', 'asc')->get();
//        // 3. lấy dữ liệu 4 tin tức mới nhất
//        $articles = Article::where('is_active', 1)
//            ->orderBy('id', 'desc')
//            ->orderBy('position', 'asc')
//            ->take(4)
//            ->get();

        // 4. cấu hình website
        $settings = Setting::first();
        // nhà cung cấp thương hiệu
        $vendors = Vendor::where('is_active', 1)
            ->orderBy('id', 'desc')
            ->orderBy('position', 'asc')->get();
        // Chia sẻ dữ qua tất các layout
        view()->share([
            'settings' => $settings,
            'categories' => $categories,
            'banners' => $banners,
            'vendors' => $vendors,
//            'articles' => $articles
        ]);
    }

    //Trang chủ
    public function index()
    {

        $list = []; // chứa danh sách sản phẩm  theo danh mục

        foreach($this->categories as $key => $parent) {
            if($parent->parent_id == 0) { // check danh mục cha
                $ids = [] ; // tạo chứa các id của danh cha + danh mục con trực thuộc

                $ids[] = $parent->id; // id danh mục cha

                foreach($this->categories as $child) {
                    if ($child->parent_id == $parent->id) {
                        $ids[] = $child->id; // thêm phần tử vào mảng
                    }
                } // ids = [1,7,8,9,..]

                $list[$key]['category'] = $parent; // điện thoại, tablet

                // SELECT * FROM `products` WHERE is_active = 1 AND is_hot = 0 AND category_id IN (1,7,9,11) ORDER BY id DESC LIMIT 10
                $list[$key]['products'] = Product::where(['is_active' => 1, 'is_hot' => 0])
                    ->whereIn('category_id' , $ids)
                    ->limit(8)
                    ->orderBy('id', 'desc')
                    ->get();


            }
        }

//         2. Lấy dữ liệu - Banner
//        $banners = Banner::where('is_active', 1)->orderBy('id', 'desc')
//            ->orderBy('position', 'asc')->get();

        return view('shops.index',[
            'list' => $list,
            //'banners' => $banners,
        ]);
    }


    //Trang liên hệ
    public function contact()
    {
        return view('shops.contact');
    }

    //Trang danh sách sản phẩm
    public function listProducts($slug)
    {
        $category = Category::where(['slug' => $slug, 'is_active' => 1])->firstOrFail();

        $ids = []; // chưa cả id cha và con
        $ids[] = $category->id;

        $listCategories = $this->categories; // lấy toàn bộ danh mục
        foreach ($listCategories as $child) {
            if ($child->parent_id == $category->id) {
                $ids[] = $child->id;

                foreach ($listCategories as $child2) {
                    if ($child2->parent_id == $child->id) {
                        $ids[] = $child2->id;
                    }
                }
            }
        }

        $products = Product::where(['is_active' => 1, 'category_id' => $ids])->get();

        return view('shops.list-products',[
            'category' => $category,
            'products' => $products
        ]);
    }

    //Trang chi tiết sản phẩm
    public function detailProduct($slug)
    {
        $product = Product::where(['slug' => $slug, 'is_active' => 1])->firstOrFail();


        // lấy ra những sản phẩm liên quan
        // 1. lấy những sản phẩm cùng danh mục
        // 2. loại trừ cái đang xem

        // step 2 : lấy list 10 SP liên quan
        $relatedProducts = Product::where([ ['is_active' , '=', 1],
                                            ['category_id', '=' , $product->category_id ],
                                            ['id', '<>' , $product->id]
        ])->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('shops.detail-products', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

    //Trang Tin Tức
    public function listArticles()
    {
        $articles = Articles::where(['is_active' => 1 ])->get();

        return view('shops.list-articles',[
            "articles" => $articles
        ]);

    }
    //Trang chi tiết tin tức
    public function detailArticle($slug)
    {
        $article = Articles::where(['slug' => $slug, 'is_active' => 1])->firstOrFail();

        return view('shops.detail-article',
            [
                'article' => $article
            ]
        );
    }


    // thêm dữ liệu khách hàng liên hệ vào bảng contact
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
