
@extends('shops.layouts.main')

@section('content')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
                <li>Mail Us</li>
            </ul>
        </div>
    </div>
    <div class="banner">
        <div class="">
            <!-- mail -->
            <div class="mail">
                <h3>Gửi Thư Cho Chúng Tôi</h3>
                <div class="agileinfo_mail_grids">
                    <div class="col-md-4 agileinfo_mail_grid_left">
                        <ul>
                            <li><i class="fa fa-home" aria-hidden="true"></i></li>
                            <li>Địa chỉ<span> {{ $settings -> address}}</span></li>
                        </ul>
                        <ul>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
                            <li>email<span><a href="mailto:info@example.com"> {{ $settings -> email}}</a></span></li>
                        </ul>
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                            <li>Gọi Cho Chúng Tôi<span> {{ $settings -> phone}}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-8 agileinfo_mail_grid_right">
                        <form class="contact-form" id="contactForm" method="post" action="{{route('shop.postContact')}}">
                            @csrf
                            <div class="col-md-6 wthree_contact_left_grid">
                                <input type="text" name="name" value="Họ Tên" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nhâp Họ Tên';}" required="">
                                <input type="email" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nhập email';}" required="">
                            </div>
                            <div class="col-md-6 wthree_contact_left_grid">
                                <input type="text" name="phone" value="Điện Thoại" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nhập số điện thoại';}" required="">
                                <input type="text" name="Subject" value="Subject*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject*';}" required="">
                            </div>
                            <div class="clearfix"> </div>
                            <textarea  name="content" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nội dung';}" required="">Nội Dung</textarea>
                            <input type="submit" value="Gửi đi">
                            <input type="reset" value="Nhập Lại">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!-- //mail -->
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d96748.15352429623!2d-74.25419879353115!3d40.731667701988506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sshopping+mall+in+New+York%2C+NY%2C+United+States!5e0!3m2!1sen!2sin!4v1467205237951" style="border:0"></iframe>
    </div>


@endsection

