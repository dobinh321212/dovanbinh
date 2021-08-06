

<!-- Header - start -->
<header class="header">
    <!-- Logo, Shop-menu - start -->
    <div class="header-middle">
        <div class="container header-middle-cont">
            <div class="toplogo">
                <a href="./">
                    <img src="fontend/img3/logo.png" alt="AllStore - MultiConcept eCommerce Template">
                </a>
            </div>
            <div class="shop-menu">
                <ul>

                    <li class="topauth">
                        <a href="#">
                            <i class="fa fa-lock"></i>
                            <span class="shop-menu-ttl">Đăng Ký</span>
                        </a>
                        <a href="http://dovanbinh.com/admin/login">
                            <span class="shop-menu-ttl">Đăng Nhập</span>
                        </a>
                    </li>

                    <li>
                        <div class="h-cart">
                            <a href="http://dovanbinh.com/gio-hang">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="shop-menu-ttl">Giỏ Hàng</span>
{{--                                (<b>0</b>)--}}
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- Logo, Shop-menu - end -->

    <!-- Topmenu - start -->
    <div class="header-bottom">
        <div class="container">
            <nav class="topmenu">

                <!-- Catalog menu - start -->
                <div class="topcatalog">
                    <a class="topcatalog-btn" href="#">Danh Mục SẢN PHẨM</a>
                    <ul class="topcatalog-list">
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                @if($category->parent_id == 0)
                                    <li>
                                        <a href="{{route('shops.listProduct',['slug'=>$category->slug])}}">
                                            {{ $category->name }}
                                        </a>
                                        <i class="fa fa-angle-right"></i>
                                        <ul>
                                            @foreach($categories as $key => $child)
                                                @if($child->parent_id == $category->id )
                                                    <li>
                                                        <a href="#">
                                                            {{ $child->name }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
                <!-- Catalog menu - end -->

                <!-- Main menu - start -->
                <button type="button" class="mainmenu-btn">Menu</button>

                <ul class="mainmenu">
                    <li><a href="./" class="">Trang Chủ</a></li>
                    <li><a href="./" class="">Công Nghệ</a></li>
                    <li><a href="http://dovanbinh.com/tin-tuc" class="">Tin Tức</a></li>
                    <li><a href="./" class="">Hỏi Đáp</a></li>
                    <li><a href="./" class="">Giới Thiệu</a></li>
                    <li><a href="http://dovanbinh.com/lien-he" class="">Liên Hệ</a></li>
{{--                    @if(!empty($categories))--}}
{{--                        @foreach($categories as $category)--}}
{{--                            @if($category->parent_id == 0)--}}
{{--                                <li class="menu-item-has-children">--}}
{{--                                    <a href="#">{{ $category->name }}<i class="fa fa-angle-down"></i></a>--}}

{{--                                    <ul class="sub-menu">--}}
{{--                                        @foreach($categories as $key => $child)--}}
{{--                                            @if($child->parent_id == $category->id )--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        {{ $child->name }}--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    @endif--}}

                </ul>
                <!-- Main menu - end -->

                <!-- Search - start -->
                <div class="topsearch">
                    <a id="topsearch-btn" class="topsearch-btn" href="#"><i class="fa fa-search"></i></a>
                    <form class="topsearch-form" action="{{ route('shop.search') }}" method="GET">
                        <input value="{{ isset($keyword) ? $keyword : '' }}" type="text"  name="tu-khoa" placeholder="Tìm Kiếm Sản Phẩm">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <!-- CATEGORYS-PRODUCT-SEARCH END -->
                <!-- Search - end -->

            </nav>		</div>
    </div>
    <!-- Topmenu - end -->

</header>
<!-- Header - end -->
