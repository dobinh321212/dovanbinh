@extends('shops.layouts.main')
@section('content')

    <!-- BLOG -->

    <!-- Main Content - start -->
    <main>
        <section class="container">


            <ul class="b-crumbs">
                <li>
                    <a href="index.html">
                        Home
                    </a>
                </li>
                <li>
                    <span>Blog</span>
                </li>
            </ul>
            <h1 class="main-ttl main-ttl-categs"><span>Blog</span></h1>
            <!-- Blog Categories -->
            <ul class="blog-categs">
                <li class="active"><a href="blog.html">All</a></li>
                <li><a href="blog.html">News</a></li>
                <li><a href="blog.html">Reviews</a></li>
                <li><a href="blog.html">Articles</a></li>
            </ul>

            <!-- Blog Posts - start -->
            <div class="posts-list blog-page">
                @foreach($articles as $article)
                <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                    <a class="posts-i-img" href="{{ route('shop.detailArticle', ['slug' => $article->slug]) }} ">
                        <img width="auto" src="{{ asset($article->image) }}">
                    </a>
                    <time class="posts-i-date" datetime="2017-01-01 12:00"><span>09</span> Jan</time>
                    <h3 class="posts-i-ttl"><a href="post.html">{{ $article->title }}</a></h3>
                    <p>  {!! $article->summary !!}</p>		<a href="post.html" class="posts-i-more">Read more...</a>
                </div>
                @endforeach
            </div>
            <!-- Blog Posts - end -->

            <!-- Pagination - start -->
            <ul class="pagi">
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li class="pagi-next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
            <!-- Pagination - end -->
        </section>
    </main>
    <!-- Main Content - end -->
@endsection
