
@extends('shops.layouts.main')

@section('content')
    <style>
        .pricee{
            font-size: 20px;
            color: #f60000;
        }
     table th.avc{
            background: #7aff00cf;
        }
    </style>

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
    {{--<div class="single-product-area">--}}
    <div class="container">

        @if(count($listProducts))

        <h3 class="component-ttl"><span>GIỎ HÀNG</span></h3>
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                <tr>

                                    <th class="avc">Ảnh</th>
                                    <th class="avc">Sản Phẩm</th>
                                    <th class="avc">Giá</th>
                                    <th class="avc">Số Lượng</th>
                                    <th class="avc">Tổng</th>
                                    <th class="avc">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listProducts as $product)

                                <tr class="cart_item">
                                    <td class="product-thumbnail">
                                        <a>
                                            <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{ ($product -> options -> image) }}" alt="">
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <a>{{ $product -> name }}</a>
                                    </td>

                                    <td class="product-price">
                                        <span class="amount">{{ number_format($product->price, 0,",",".") }} đ</span>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <input type="number" size="4" class="cart-plus-minus" title="Qty" value="{{ $product->qty }}" min="0" step="1">
                                        </div>
                                        <br>
                                        <button data-id="{{ $product-> rowId  }}" type="button" class="btn btn-success btnUpdateQty" >Cập nhật</button>
                                    </td>

                                    <td class="product-subtotal">
                                        <span >{{ number_format( $product->qty * $product->price, 0,",",".") }} đ</span>
                                    </td>

                                    <td class="product-remove">
                                        <a title="Remove this item" class="remove" href="{{ route('shop.removeProductToCart',['rowId' => $product-> rowId ]) }}"> <span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>

                                @endforeach

                                <tr class="order-total">
                                    <th>Tổng Tiền</th>
                                    <td class="actions" colspan="5"><strong><span class="pricee">{{ $totalPrice }} đ</span></strong> </td>
                                </tr>
                                <tr>
                                    <td class="actions" colspan="6">
                                        <div class="coupon">
                                            <a href="http://dovanbinh.com/" type="button" class="btn btn-warning">Tiếp tục mua hàng</a>
                                        </div>

                                        <a href="{{ route('shop.cancelCart') }}" type="button" class="btn btn-danger">Hủy</a>
                                        <a  href="{{ route('shop.order') }}"type="button" class="btn btn-success">Tiến hành đặt hàng</a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </form>

{{--                        <div class="cart-collaterals">--}}



{{--                            <div class="cart_totals ">--}}
{{--                                <table cellspacing="0">--}}
{{--                                    <tbody>--}}
{{--                                    <tr class="order-total">--}}
{{--                                        <th>Tổng giỏ hàng</th>--}}
{{--                                        <td><strong><span class="amount">{{ $totalPrice }} đ</span></strong> </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}



{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>

        @else
            <div style="text-align: center" >

                <img src="./uploads/setting/giohang.png">
                <br>
                 <br>
                 <h3> Hiện chưa có sản phẩm nào trong giỏ hàng!</h3>
            </div>
        @endif
    </div>
    <br>
    <br>
{{--</div>--}}
@endsection

{{--Cập nhật giỏ hàng--}}
@section('my_js')
<script type="text/javascript">
    $(document).ready(function (){

        //đính kèm token vào nmooxi request ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('metan[name="csrf-token"]').attr('content')
            }
        });
        $('.btnUpdateQty').click(function (){

        var qty = $(this).closest('.product-quantity').find('.cart-plus-minus').val();
        var rowId = $(this).attr('data-id');

        window.location.href = '/cap-nhat-so-luong/'+rowId+ '/' +qty;

        });
    });
</script>
@endsection
