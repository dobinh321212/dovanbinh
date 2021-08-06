<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Trang Chủ
Route::get('/', 'ShopController@index' );

// Trang liên hệ
Route::get('/lien-he', 'ShopController@contact');
Route::post('/postContact', 'ShopController@postContact')->name('shop.postContact');

//tìm kiếm
Route::get('/tim-kiem', 'ShopController@search')->name('shop.search');
// Trang danh mục
Route::get('/danh-muc-san-pham/{slug}', 'ShopController@listProducts')->name('shops.listProduct');

// Trang chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{slug}', 'ShopController@detailProduct')->name('shop.detailProduct');

// Trang danh sach tin tuc
Route::get('/tin-tuc', 'ShopController@listArticles')->name('shop.listArticles');

// Trang chi tiet tin tuc
Route::get('/chi-tiet-tin-tuc/{slug}', 'ShopController@detailArticle')->name('shop.detailArticle');
//dat hang
Route::get('/them-san-pham-vao-gio/{id}', 'ShopController@addToCart')->name('shop.addToCart');
// man hinh danh sach san pham
Route::get('/gio-hang', 'ShopController@cart')->name('shop.cart');

//nút hủy đơn hàng
Route::get('/huy-don-hang', 'ShopController@cancelCart')->name('shop.cancelCart');

//nút xóa sản phẩm
Route::get('/xoa-san-pham-trong-gio-hang/{rowid}', 'ShopController@removeProductToCart')->name('shop.removeProductToCart');

//cập nhật số lượng
Route::get('/cap-nhat-so-luong/{rowId}/{qty}', 'ShopController@updateCart')->name('shop.updateCart');

//tiến hành đặt hàng
Route::get('/dat-hang', 'ShopController@order')->name('shop.order');

Route::post('/dat-hang', 'ShopController@postOrder')->name('shop.postOrder');

Route::get('/dat-hang-thanh-cong', 'ShopController@orderSuccess')->name('shop.orderSuccess');

//
////thanh toan
//Route::get('/thanh-toan', 'ShopController@order');

// Đăng nhập
Route::get('/admin/login', 'LoginController@login')->name('admin.login');
// Đăng xuất
Route::get('/admin/logout', 'LoginController@logout')->name('admin.logout');

Route::post('/admin/postLogin', 'LoginController@postLogin')->name('admin.postLogin');

//Gom nhóm route của trang admin thông qua hàm group
Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'checkLogin'], function() {
// giúp cho chúng ta tạo các url tương ứng với controller...
    Route::resource('category', 'CategoryController');
    Route::resource('banner', 'BannerController');
    Route::resource('vendor', 'VendorController');
    Route::resource('product', 'ProductController');
    Route::resource('user', 'UserController');
    Route::resource('setting', 'SettingController');
    // QL bài viết
    Route::resource('article', 'ArticleController');

    Route::resource('order', 'OrderController');
});
