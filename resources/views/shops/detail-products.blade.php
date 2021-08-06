@extends('shops.layouts.main')

@section('content')

    <style>
        .pricee{
            font-size: 30px;
            color: #f60000;
        }
        .price_sale{
            width: 388px;
        }
    </style>
    <ul style="margin-left: 105px" class="b-crumbs">
        <li>
            <a href="http://dovanbinh.com/">
                Trang Chủ
            </a>
        </li>
        <li>
            <span>Chi tiết sản phẩm</span>
        </li>
    </ul>
    <section class="container">
    <div class="chitietSanpham" style="min-height: 85vh">
        <h1>{{ $product -> name }} </h1>
        <div class="prod-wrap">
            <div class="prod-slider-wrap">
                <div class="prod-slider">
                    <ul class="prod-slider-car">
                        <li>
                            <a data-fancybox-group="product" class="fancy-img" href="http://placehold.it/500x642">
                                <img src="{{($product->image) }}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="prod-thumbs">
                    <ul class="prod-thumbs-car">
                        <li>
                            <a data-slide-index="0" href="#">
                                <img src="{{($product->image1) }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="1" href="#">
                                <img src="{{($product->image2) }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="2" href="#">
                                <img src="{{($product->image3) }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="3" href="#">
                                <img src="{{($product->image4) }}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="price_sale">
                <div class="pricee"> {{ number_format($product->sale,0,",",".") }} đ</div><del>{{ number_format($product->price,0,",",".") }} đ</del>
                <div class="area_promo">
                    <strong>khuyến mãi</strong>
                    <div class="promo">
                        <i class="fa fa-check-circle"></i>
                        <div id="detailPromo"> Cơ hội trúng 1 chỉ vàng </div>
                    </div>
                </div>
                <div class="policy">
                    <div>
                        <i class="fa fa-archive"></i>
                        <p>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim, Ốp lưng </p>
                    </div>
                    <div>
                        <i class="fa fa-star"></i>
                        <p>Bảo hành chính hãng 12 tháng.</p>
                    </div>
                    <div class="last">
                        <i class="fa fa-retweet"></i>
                        <p>1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.</p>
                    </div>
                </div>
                <div class="prod-cont">
                     <div class="prod-skuwrap">
                    <p class="prod-skuttl">Chọn màu</p>
                    <ul class="prod-skucolor">
                        <li class="active">
                            <img src="fontend/img/color/blue.jpg" alt="">
                        </li>
                        <li>
                            <img src="fontend/img/color/red.jpg" alt="">
                        </li>
                        <li>
                            <img src="fontend/img/color/green.jpg" alt="">
                        </li>
                        <li>
                            <img src="fontend/img/color/yellow.jpg" alt="">
                        </li>
                        <li>
                            <img src="fontend/img/color/purple.jpg" alt="">
                        </li>
                    </ul>
                         <p class="prod-skuttl">Bộ Nhớ</p>
                         <div class="offer-props-select">
                             <p>Chọn</p>
                             <ul>
                                 <li><a>3-32GB</a></li>
                                 <li><a>4-64GB</a></li>
                                 <li><a>6-128GB</a></li>
                                 <li><a>8-128GB</a></li>
                             </ul>
                         </div>

                </div>
                    <div class="prod-info">
                        <div class="area_order">
                            <!-- nameProduct là biến toàn cục được khởi tạo giá trị trong phanTich_URL_chiTietSanPham -->
                            <a class="buy_now" href="{{ route('shop.addToCart', ['id' => $product->id]) }}">
                                <h3><i class="fa fa-plus"></i> Mua ngay</h3>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="prod-related">
            <h2><span>Sản Phẩm Tương Tự</span></h2>
            <div class="prod-related-car" id="prod-related-car">
                <ul class="slides">
                    @foreach($relatedProducts as $item)
                        <li class="prod-rel-wrap">
                            @foreach($relatedProducts as $item)
                                <div class="prod-rel">
                                    <a href="{{ route('shop.detailProduct',['slug' => $product->slug]) }}" class="prod-rel-img">
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                    </a>
                                    <div class="prod-rel-cont">
                                        <h3><a href="{{ route('shop.detailProduct',['slug' => $product->slug]) }}">{{ $item->name }}</a></h3>
                                        <p class="prod-rel-price">
                                            <b>{{ number_format($item->sale,0,",",".") }} đ</b>
                                        </p>
                                        <div class="prod-rel-actions">
                                            <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                                            <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                                            <p class="prod-i-addwrap">
                                                <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


{{--        san pham da xem --}}
        <div class="prod-related">
            <h2><span>Sản Phẩm Đã Xem</span></h2>
            <div class="prod-related-car" id="prod-related-car">
                <ul class="slides">
                    @foreach($viewedProducts as $item)
                        <li class="prod-rel-wrap">
                            @foreach($viewedProducts as $item)
                                <div class="prod-rel">
                                    <a href="{{ route('shop.detailProduct',['slug' => $product->slug]) }}" class="prod-rel-img">
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                    </a>
                                    <div class="prod-rel-cont">
                                        <h3><a href="{{ route('shop.detailProduct',['slug' => $product->slug]) }}">{{ $item->name }}</a></h3>
                                        <p class="prod-rel-price">
                                            <b>{{ number_format($item->sale,0,",",".") }} đ</b>
                                        </p>
                                        <div class="prod-rel-actions">
                                            <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                                            <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                                            <p class="prod-i-addwrap">
                                                <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


{{--        --}}
        <div class="prod-tabs-wrap">
            <ul class="prod-tabs">
                <li><a data-prodtab-num="1" class="active" href="#" data-prodtab="#prod-tab-1">Mô tả</a></li>
                <li><a data-prodtab-num="2" id="prod-props" href="#" data-prodtab="#prod-tab-2">Thông Số</a></li>
                <li><a data-prodtab-num="3" href="#" data-prodtab="#prod-tab-3">Video</a></li>
                <li><a data-prodtab-num="4" href="#" data-prodtab="#prod-tab-4">Bài Viết (6)</a></li>
                <li><a data-prodtab-num="5" href="#" data-prodtab="#prod-tab-5">Nhận xét (3)</a></li>
            </ul>
            <div class="prod-tab-cont">

                <p data-prodtab-num="1" class="prod-tab-mob active" data-prodtab="#prod-tab-1">Mô tả</p>
                <div class="prod-tab stylization" id="prod-tab-1">
                    <p  {!! $product->description !!}</p>
                </div>
                <p data-prodtab-num="2" class="prod-tab-mob" data-prodtab="#prod-tab-2">Features</p>
                <div class="prod-tab prod-props" id="prod-tab-2">
                    <table>
                        <tbody>
                        <tr>
                            <td>SKU</td>
                            <td>05464207</td>
                        </tr>
                        <tr>
                            <td>Material</td>
                            <td>Nylon</td>
                        </tr>
                        <tr>
                            <td>Pattern Type</td>
                            <td>Solid</td>
                        </tr>
                        <tr>
                            <td>Wash</td>
                            <td>Colored</td>
                        </tr>
                        <tr>
                            <td> Style </td>
                            <td> Sport </td>
                        </tr>
                        <tr>
                            <td> Color </td>
                            <td> Blue </td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>Unisex</td>
                        </tr>
                        <tr>
                            <td> Rain Cover</td>
                            <td> No</td>
                        </tr>
                        <tr>
                            <td>Exterior</td>
                            <td>Solid Bag</td>
                        </tr>
                        <tr>
                            <td>Closure Type</td>
                            <td>Zipper</td>
                        </tr>
                        <tr>
                            <td>Handle/Strap Type</td>
                            <td>Soft Handle</td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>33cm x 18cm x 48cm</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <p data-prodtab-num="3" class="prod-tab-mob" data-prodtab="#prod-tab-3">Video</p>
                <div class="prod-tab prod-tab-video" id="prod-tab-3">
                    <iframe width="853" height="480" src="https://www.youtube.com/embed/kaOVHSkDoPY?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
                <p data-prodtab-num="4" class="prod-tab-mob" data-prodtab="#prod-tab-4">Articles (6)</p>
                <div class="prod-tab prod-tab-articles" id="prod-tab-4">
                    <div class="flexslider post-rel-wrap" id="post-rel-car">
                        <ul class="slides">
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/354x236)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>09</span> Feb</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Articles</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Adipisci corporis velit</a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/360x203)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>05</span> Jan</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Reviews</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Excepturi ducimus recusandae</a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/360x224)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>17</span> Apr</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Reviews</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Consequuntur minus numquam </a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/314x236)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>21</span> May</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Articles</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Non ex sapiente excepturi</a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/318x236)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>24</span> Jan</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Articles</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Veritatis officiis</a></h3>
                                </div>
                            </li>
                            <li class="posts-i">
                                <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/354x236)"></span></a>
                                <time class="posts-i-date" datetime="2017-01-01 08:18"><span>08</span> Sep</time>
                                <div class="posts-i-info">
                                    <a class="posts-i-ctg" href="blog.html">Reviews</a>
                                    <h3 class="posts-i-ttl"><a href="post.html">Ratione magni laudantium</a></h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <p data-prodtab-num="5" class="prod-tab-mob" data-prodtab="#prod-tab-5">Reviews (3)</p>
                <div class="prod-tab" id="prod-tab-5">
                    <ul class="reviews-list">
                        <li class="reviews-i existimg">
                            <div class="reviews-i-img">
                                <img src="http://placehold.it/120x120" alt="Averill Sidony">
                                <div class="reviews-i-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                            </div>
                            <div class="reviews-i-cont">
                                <p>Numquam aliquam maiores ratione dolores ducimus, laborum hic similique delectus. Neque saepe nobis omnis laudantium itaque tempore voluptate harum error, illum nemo, reiciendis architecto, quam tenetur amet sit quisquam cum.<br>Pariatur cum tempore eius nulla impedit cumque odit quos porro iste a voluptas, optio alias voluptate minima distinctio facere aliquid quasi, vero illum tenetur sed temporibus eveniet obcaecati. </p>
                                <span class="reviews-i-margin"></span>
                                <h3 class="reviews-i-ttl"> Averill Sidony</h3>
                                <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer </span> <i class="fa fa-angle-down"> </i> </p>
                            </div>
                            <div class="reviews-i-answer">
                                <p>Thanks for your feedback! <br>
                                    Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero explicabo, esse dolores rem at dolorum doloremque iusto laboriosam repellendus. <br>Numquam eius voluptatum sint modi nihil exercitationem dolorum asperiores maiores provident repellat magnam vitae, consequatur omnis expedita, accusantium voluptas odit id.</p>
                                <span class="reviews-i-margin"></span>
                            </div>
                        </li>
                        <li class="reviews-i existimg">
                            <div class="reviews-i-img">
                                <img src="http://placehold.it/120x120" alt="Araminta Kristeen">
                                <div class="reviews-i-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <time datetime="2017-12-21 12:19:46" class="reviews-i-date">14 February 2017</time>
                            </div>
                            <div class="reviews-i-cont">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                <span class="reviews-i-margin"></span>
                                <h3 class="reviews-i-ttl">Araminta Kristeen</h3>
                                <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                            </div>
                            <div class="reviews-i-answer">
                                Benjy, hi!<br>
                                Officiis culpa quos, quae optio quia.<br>
                                Amet sunt dolorem tempora, pariatur earum quidem adipisci error voluptates tempore iure, nobis optio temporibus voluptatum delectus natus accusamus incidunt provident sapiente explicabo vero labore hic quo?
                                <span class="reviews-i-margin"></span>
                            </div>
                        </li>
                        <li class="reviews-i">
                            <div class="reviews-i-cont">
                                <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                                <div class="reviews-i-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                <span class="reviews-i-margin"></span>
                                <h3 class="reviews-i-ttl">Jeni Margie</h3>
                                <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                            </div>
                            <div class="reviews-i-answer">
                                Hello, Jeni Margie!<br>
                                Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero explicabo, esse dolores rem at dolorum doloremque iusto laboriosam repellendus. <br>Numquam eius voluptatum sint modi nihil exercitationem dolorum asperiores maiores provident repellat magnam vitae, consequatur omnis expedita, accusantium voluptas odit id.
                                <span class="reviews-i-margin"></span>
                            </div>
                        </li>
                    </ul>
                    <div class="prod-comment-form">
                        <h3>Add your review</h3>
                        <form method="POST" action="#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="E-mail">
                            <textarea placeholder="Your review"></textarea>
                            <div class="prod-comment-submit">
                                <input type="submit" value="Submit">
                                <div class="prod-rating">
                                    <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="guiBinhLuan">
            <div class="stars">
                <form action="">
                    <input class="star star-5" id="star-5" value="5" type="radio" name="star"/>
                    <label class="star star-5" for="star-5" title="Tuyệt vời"></label>

                    <input class="star star-4" id="star-4" value="4" type="radio" name="star"/>
                    <label class="star star-4" for="star-4" title="Tốt"></label>

                    <input class="star star-3" id="star-3" value="3" type="radio" name="star"/>
                    <label class="star star-3" for="star-3" title="Tạm"></label>

                    <input class="star star-2" id="star-2" value="2" type="radio" name="star"/>
                    <label class="star star-2" for="star-2" title="Khá"></label>

                    <input class="star star-1" id="star-1" value="1" type="radio" name="star"/>
                    <label class="star star-1" for="star-1" title="Tệ"></label>
                </form>
            </div>
            <textarea maxlength="250" id="inpBinhLuan" placeholder="Viết suy nghĩ của bạn vào đây..."></textarea>
            <input id="btnBinhLuan" type="button" onclick="checkGuiBinhLuan()" value="GỬI BÌNH LUẬN">
        </div>
        <br>
        <br>
    </div>


    </section>
@endsection
