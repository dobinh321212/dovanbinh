<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Contact;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Setting;
use App\Articles;
use App\Vendor;
use Illuminate\Http\Request;
use Cart;


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
    public function detailProduct($slug=null)
    {



        $product = Product::where([ 'slug' => $slug, 'is_active' => 1])->firstOrFail();

// khai báo mảng chứa danh sách các sản phẩm đã xem
        $viewedProducts = [];

// xử lý lưu tin đã xem
        if (isset($_COOKIE['list_product_viewed'])) {
            $list_products_viewed = $_COOKIE['list_product_viewed']; // list id sản phẩm
            $list_products_viewed = json_decode($list_products_viewed); // chuyển chuỗi list id=> mảng

            // kiểm tra nếu chưa tồn tại trong list đã xem ??
            if (!in_array($product->id, $list_products_viewed)) {
                $list_products_viewed[] = $product->id;  // thêm id tiếp theo vào mảng đã xem

                // 44 , 9, 10 ,13, 67, 99 ,89, 70, 71
                // lấy ra 4 cái id mới nhất
                $list_products_viewed = array_slice($list_products_viewed,-4,4);

                // danh sách bị thay đổi => nạp lại giá trị cho key
                $_list = json_encode($list_products_viewed);
                setcookie('list_product_viewed', $_list , time() + (7*86400));
            }

            // lấy ra danh sách sách sản phẩm đã xem từ mảng : $list_products_viewed
            $viewedProducts = Product::where([
                ['is_active' , '=', 1],
                ['id', '<>' , $product->id]
            ])->whereIn('id' , $list_products_viewed)
                ->take(5)
                ->get();

//            dd($viewedProducts);


        } else {
            // lưu id sẩn phẩm đã xem lần đầu vào cookie
            $arr_product_id = [$product->id];
            $arr_product_id = json_encode($arr_product_id); // { "ten" : "gia tri"  }
            setcookie('list_product_viewed', $arr_product_id , time() + (7*86400));
        }

        // lấy ra những sản phẩm liên quan
        // 1. lấy những sản phẩm cùng danh mục
        // 2. loại trừ cái đang xem

        // step 2 : lấy list 10 SP liên quan
        $relatedProducts = Product::where([ ['is_active' , '=', 1],
                                            ['category_id', '=' , $product->category_id ],
                                            ['id', '<>' , $product->id]
        ])->orderBy('id', 'desc')
            ->take(4)
            ->get();


        return view('shops.detail-products', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'viewedProducts' => $viewedProducts
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

    //thêm sản phẩm vào giỏ hàng
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // thông tin sẽ lưu vào giỏ

        // gọi đến thư viện thêm sản phẩm vào giỏ hàng
        Cart::add(
            ['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->sale,'tax' => 0, 'priceTax' => 0, 'options' => ['tax' => 0 , 'priceTax' => 0, 'image' => $product->image]]
        );

        //session(['totalItem' => Cart::count()]);

        // chuyển về trang danh sách sản phảm trong giỏ hàng
        return redirect()->route('shop.cart');
    }

    //danh sách đặt hàng - giỏ hàng
    public function cart()
    {
        // lấy dữ liệu = tất cả sản phẩm trong giỏ hàng
        // b1. lấy toàn bộ sản phẩm đã lưu trong giỏ
        $listProducts = Cart::content();

        // lấy tổng giá của đơn hàng
        $totalPrice = Cart::subtotal(0,",",".");

        return view('shops.cart.index', [
            'listProducts' => $listProducts,
            'totalPrice' => $totalPrice
        ]);

    }

    //Hủy đơn hàng trong giỏ hàng
    public function cancelCart()
    {
         Cart::destroy();

        return redirect('/');

    }

    //Xóa sản phẩm trong giỏ hàng
    public function removeProductToCart($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('shop.cart');
    }



    //cập nhật số lượng trong giỏ hàng
    public function updateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);

        return redirect()->route('shop.cart');
    }

    //tiền hành đặt hàng
    public function order()
    {
        $product = Product::where([ 'is_active' => 1])->firstOrFail();
        // step 2 : lấy list 10 SP liên quan
        $relatedProducts = Product::where([ ['is_active' , '=', 1],
            ['category_id', '=' , $product->category_id ],
            ['id', '<>' , $product->id]
        ])->orderBy('id', 'desc')
            ->take(5)
            ->get();


        return view('shops.cart.order', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }
    //lưu được thông tin sản phẩm vào csdl
    // Thanh toán

    public function postOrder(Request $request)
    {
        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // Lưu vào bảng đơn đặt hàng - orders
        $order = new Order();
        $order->fullname = $request->input('fullname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->note = $request->input('note');

        // lấy tổng giá của đơn hàng
        $totalPrice = Cart::subtotal(0,",",'');
        $order->total = $totalPrice; // tổng giá
        $order->order_status_id = 1; // 1 = mới , 2 = đang xử lý, 3= hoàn thành, 4 = hủy
        //$order->save();


        if ($order->save()) {
            // xử lý lưu chi tiết
            $id_order = $order->id;

            // lấy toàn bộ sản phẩm đã lưu trong giỏ
            $listProducts = Cart::content();

            foreach ($listProducts as $product)
            {
                //dd($product);
                $_detail = new OrderProduct();
                $_detail->order_id = $id_order;
                $_detail->name = $product->name;
                $_detail->image = $product->options->image;
                $_detail->product_id = $product->id;
                $_detail->qty = $product->qty;
                $_detail->price = $product->price;
                $_detail->save();

                // Giam số lượng trong kho
            }

            // Xóa thông tin giỏ hàng Hiện tại
            Cart::destroy();

            // chuyển về trang thông báo đặt hàng thành công
            return redirect()->route('shop.orderSuccess');
        }

    }

    // trang thông báo đặt hàng thành công
    public function orderSuccess()
    {
        return view('shops.cart.orderSuccess');
    }

    //tìm kiếm
    public function search(Request $request)
    {
        // b1. Lấy từ khóa tìm kiếm
        $keyword = $request->input('tu-khoa');

        $slug = str_slug($keyword);

        //$sql = "SELECT * FROM products WHERE is_active = 1 AND slug like '%$keyword%'";
        //b2 lấy sản phẩm gần giống với từ khóa tìm kiếm
        $products = Product::where([
            ['slug', 'like', '%' . $slug . '%'],
            ['is_active', '=', 1]
        ])->paginate(20);


        $totalResult = $products->total(); // số lượng kết quả tìm kiếm

        return view('shops.search', [
            'products' => $products,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }
}
