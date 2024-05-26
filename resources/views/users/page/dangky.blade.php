@extends('users.layout')
@section('title','Đăng Ký')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('trang-chu') }}">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="{{ route('signin') }}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-sm-3"></div>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{ $err }}
                    @endforeach
                </div>
                @endif
                @if(Session::has('thanhcong'))
                <div class="alert alert-success">{{ Session::get('thanhcong') }}</div>
                @endif
                <div class="col-sm-6" style="color: orangered">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="email"><b>Email*</b></label>
                        <input type="email" name="email" placeholder="Nhập Email..." required>
                    </div>

                    <div class="form-block">
                        <label for="your_last_name"><b>Tên*</b></label>
                        <input type="text" placeholder="Nhập Họ Tên..." name="name" required>
                    </div>
                    <div class="form-block">
                        <label for="adress"><b>Địa Chỉ*</b></label>
                        <input type="text" placeholder="Nhập Địa Chỉ..." name="diachi" required>
                    </div>
                    <div class="form-block">
                        <label for="phone"><b>Số Điện Thoại*</b></label>
                        <input type="text" placeholder="Nhập SDT..." name="dienthoai" required>
                    </div>

                    <div class="form-block position-relative">
                        <label for="password"><b>Mật Khẩu*</b></label>
                        <input type="password" placeholder="Nhập Pass..." name="password" id="password" required>
                        <span class="eye-icon" id="toggle-password">
                            <i class="fas fa-eye" id="eye-icon"></i>
                        </span>
                    </div>
                    <div class="form-block position-relative">
                        <label for="phone"><b>Nhập Lại Mật Khẩu*</b></label>
                        <input type="password" placeholder="Nhập Lại Pass..." name="re_password" id="re_password" required>
                        <span class="eye-icon" id="toggle-repassword">
                            <i class="fas fa-eye" id="eye-icon"></i>
                        </span>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->

<style>
    .position-relative {
        position: relative;
    }
    .eye-icon {
        position: absolute;
        top: 50%;
        right: 30px;
        transform: translateY(-50%);
        cursor: pointer;
    }
    .form-control {
        padding-right: 30px; /* Đảm bảo có đủ không gian cho biểu tượng con mắt */
    }
</style>

<script>
    document.getElementById('toggle-password').addEventListener('click', function () {
        var passwordField = document.getElementById('password');
        var eyeIcon = document.getElementById('eye-icon');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });

    document.getElementById('toggle-repassword').addEventListener('click', function () {
        var rePasswordField = document.getElementById('re_password');
        var eyeIcon = document.getElementById('eye-icon');
        if (rePasswordField.type === 'password') {
            rePasswordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            rePasswordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
</script>
@endsection
