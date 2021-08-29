

<style>
    .product-carousel-price {
        color: #ff0000;
    }
    .product-f-image {
        position: relative;
        height: 243px;
    }

    /*.product-carousel-price{*/
    /*     position: absolute;*/
    /*     text-align: center;*/
    /*     margin: 0px auto;*/
    /*     bottom: 5px;*/
    /* }*/
</style>



@extends('shops.layouts.main')

@section('content')
<!-- Main Content - start -->
<main>
    <section class="container">


        <!-- Slider -->
        <div class="fr-slider-wrap">
            <div class="fr-slider">
                <ul class="slides">
                    @foreach($banners as $banner)
                    <li>
                        <img src="{{$banner->image}}" alt="">
{{--                        <div class="fr-slider-cont">--}}
{{--                            <h3>MEGA SALE -30%</h3>--}}
{{--                            <p>Winter collection for women's. <br>We all have choices for you. Check it out!</p>--}}
{{--                            <p class="fr-slider-more-wrap">--}}
{{--                                <a class="fr-slider-more" href="#">View collection</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="promo-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo promo1">
                            <i class="fa fa-refresh"></i>
                            <p>30 Ngày gần đây</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo promo2">
                            <i class="fa fa-truck"></i>
                            <p>Miễn Phí Ship</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo promo3">
                            <i class="fa fa-lock"></i>
                            <p>Thanh Toán An Toàn</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo promo4">
                            <i class="fa fa-gift"></i>
                            <p>Sản Phẩm mới</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End promo area -->

        @foreach ($list as $item)
            <h3 class="component-ttl"><span>{{ $item['category']->name }}</span></h3>
        <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <div class="product-carousel">
                                @foreach($item['products'] as $product)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ asset($product -> image) }}" alt="">
                                        <div class="product-hover">
                                            <a  href="{{ route('shop.addToCart', ['id' => $product->id]) }}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Mua hàng</a>
                                            <a href="{{ route('shop.detailProduct',['slug' => $product->slug]) }}" class="view-details-link"><i class="fa fa-link"></i> Chi tiết</a>
                                        </div>
                                    </div>

                                    <h2><a href="{{ route('shop.detailProduct',['slug' => $product->slug ]) }}">{{ $product->name }}</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>{{ number_format($product->sale, 0,",",".") }} đ</ins> <del>{{ number_format($product->price,0,",",".") }} đ</del>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End main content area -->
        @endforeach
        <h3 class="component-ttl"><span>Nhà Cung Cấp Nổi Tiếng</span></h3>
        <div class="brands-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand-wrapper">
                            <div class="brand-list">
                                @foreach($vendors as $vendor)
                                <img src="{{asset($vendor->image)}}" alt="#">

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End brands area -->


        <!-- Testimonials -->
        <div class="reviews-wrap">
            <div class="reviewscar-wrap">
                <div class="swiper-container reviewscar">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <p>Webshop Điện Tử kính chào Quý khách! Cám ơn Quý khách đã ủng hộ và yêu quý WebShop ! </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>
<!-- Main Content - end -->
@endsection
