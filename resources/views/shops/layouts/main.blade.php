<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name = "csrf-token" content="width = device-width, initial-scale=1">
    <title>Điện Tử</title>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700ii%7CRoboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">
    <base href="{{asset("dovanbinh.com")}}" />

    <link rel="stylesheet" href="fontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="fontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontend/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="fontend/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" href="fontend/css/jquery.bxslider.css">
    <link rel="stylesheet" href="fontend/css/jquery.fancybox.css">
    <link rel="stylesheet" href="fontend/css/flexslider.css">
    <link rel="stylesheet" href="fontend/css/swiper.css">
    <link rel="stylesheet" href="fontend/css/swiper.css">
    <link rel="stylesheet" href="fontend/css/style.css">
    <link rel="stylesheet" href="fontend/css/media.css">
{{--    _______________________________________________--}}
{{--    fontend2--}}
    <link href="fontend/css2/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fontend/css2/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="fontend/css2/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="fontend/js2/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="fontend/js2/move-top.js"></script>
    <script type="text/javascript" src="fontend/js2/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

{{--    -------------------------fontend3--------------------------}}
<!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="fontend/css3/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontend/css3/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="fontend/css3/owl.carousel.css">
    <link rel="stylesheet" href="fontend/style.css">
    <link rel="stylesheet" href="fontend/css3/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
{{--    -------------fontend4-----------------}}
    <link type="image/x-icon" rel="Shortcut Icon" href="//cdn01.dienmaycholon.vn/filewebdmclnew/public/default/img/favicon.ico">


{{--    ==============--}}
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">


    <!-- our files -->
    <!-- css -->
    <link rel="stylesheet" href="fontend/css1/style.css">
    <link rel="stylesheet" href="fontend/css1/chitietsanpham.css">
    <!-- js -->

</head>
<body>


@include('shops.layouts.header')

{{--     NỘI DUNG--}}
@yield('content')

@include('shops.layouts.footer')


<!-- jQuery plugins/scripts - start -->
<script src="fontend/js/jquery-1.11.2.min.js"></script>
<script src="fontend/js/jquery.bxslider.min.js"></script>
<script src="fontend/js/fancybox/fancybox.js"></script>
<script src="fontend/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
<script src="fontend/js/jquery.flexslider-min.js"></script>
<script src="fontend/js/swiper.jquery.min.js"></script>
<script src="fontend/js/jquery.waypoints.min.js"></script>
<script src="fontend/js/progressbar.min.js"></script>
<script src="fontend/js/ion.rangeSlider.min.js"></script>
<script src="fontend/js/chosen.jquery.min.js"></script>
<script src="fontend/js/jQuery.Brazzers-Carousel.js"></script>
<script src="fontend/js/plugins.js"></script>
<script src="fontend/js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhAYvx0GmLyN5hlf6Uv_e9pPvUT3YpozE"></script>
<script src="fontend/js/gmap.js"></script>
<!-- jQuery plugins/scripts - end -->

{{--------------------------js3---------}}


<!-- jQuery sticky menu -->
<script src="fontend/js3/owl.carousel.min.js"></script>
<script src="fontend/js3/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="fontend/js3/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="fontend/js3/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="fontend/js3/bxslider.min.js"></script>
<script type="text/javascript" src="fontend/js3/script.slider.js"></script>
@yield('my_js')
</body>
</html>
