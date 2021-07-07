<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ĐĂNG NHẬP</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontend/stylee.css">
</head>
<body>
<div class="login">
    <i class="fa fa-empire"></i>
    <h2>WEBSHOP</h2>

    <form role="form" action="{{route('admin.postLogin')}}" method="post">
        @csrf
        <div class="form-group has-feedback">
            <input name="email" type="email" class="form-control" placeholder="E-mail">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert" style="color:#ff0000;">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group has-feedback">
            <input  name="password" type="password" class="form-control" placeholder="Mật khẩu">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('password') }}</span>
            @endif
        </div>
        @if (session('msg'))
            <div class="form-group has-feedback"><a href="#" style="color: red">{{ session('msg') }}</a></div>
        @endif

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" id="remember"> Ghi nhớ
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Nhập</button>
                <p class="fs">Quên <a href="#">Tên Người Dùng</a> / <a href="#">Mật Khẩu</a> ? </p>
                <p class="ss">Không Có Tài Khoản? <a href="">Đăng Ký</a></p>
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>
</body>
</html>
