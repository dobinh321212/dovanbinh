

@extends('shops.layouts.main')
@section('content')


    <ul style="margin-left: 105px" class="b-crumbs">
        <li>
            <a href="http://dovanbinh.com/">
                Trang Chủ
            </a>
        </li>
        <li>
            <span>Giỏ Hàng</span>
        </li>
    </ul>
    <div class="single-product-area">

        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản Phẩm Khác</h2>

                        @foreach($relatedProducts as $item)
                            <div class="thubmnail-recent">
                                <img src="{{ asset($item->image) }}" class="recent-thumb" alt="">
                                <h2><a href="{{ route('shop.detailProduct',['slug' => $product->slug]) }}">{{ $item->name }}</a></h2>
                                <div class="product-sidebar-price">
                                    <ins>{{ number_format($item->sale,0,",",".") }} đ</ins> <del>{{ number_format($product->price,0,",",".") }} đ</del>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <h2 class="sidebar-title">Thông Tin Khách Hàng</h2>
                            <form enctype="multipart/form-data" action="{{ route('shop.postOrder') }}" class="checkout" method="post" name="checkout">
                                @csrf
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label> Họ Và Tên </label>
                                                <input type="text" value="" placeholder="Nhập họ và tên" id="fullname" name="fullname" class="input-text ">
                                            </p>
                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label>Địa Chỉ Nhận Hàng
                                                </label>
                                                <textarea cols="5" rows="2" placeholder="Nhập địa chỉ" id="order_comments" class="input-text " name="address" ></textarea>

                                            </p>

                                        </div>
                                        <a href="{{ route('shop.cancelCart') }}" type="button" class="btn btn-danger">Hủy đơn hàng</a>
                                    </div>

                                    <div class="col-2">
                                        <div class="woocommerce-shipping-fields">
                                            <div class="shipping_address" style="display: block;">

                                                <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                    <label>Email
                                                    </label>
                                                    <input type="text" value="" placeholder="Nhập email" id="contactEmail" name="email" class="input-text ">
                                                </p>

                                                <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                    <label >Điện Thoại
                                                    </label>
                                                    <input type="text" value="" placeholder=" Nhập số điện thoại" id="billing_phone" name="phone" class="input-text ">
                                                </p>


                                            </div>
                                            <p id="order_comments_field" class="form-row notes">
                                                <label class="" for="order_comments">Ghi chú đơn hàng</label>
                                                <textarea cols="5" rows="2" placeholder="" id="order_comments" class="input-text " name="note"></textarea>
                                            </p>
                                            <button type="submit" class=" btn btn-success">Gửi đơn hàng </button>

                                        </div>


                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
