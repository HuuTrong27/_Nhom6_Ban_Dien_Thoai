@extends('users.layout')
@section('title','Đăng Nhập')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('trang-chu') }}">Home</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="login-form">
            <div class="w3layouts-main" style="text-align: center">
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                    <li class="text-danger"> {{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                @if (session('status'))
                <ul>
                    <li class="text-danger"> {{ session('status') }}</li>
                </ul>
                @endif

                @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif
            </div>

            <form action="{{ route('login') }}" method="post" class="beta-form-checkout">
                {{ csrf_field() }}
                <div class="col-sm-3"></div>

                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-block position-relative">
                        <label for="password">Password*</label>
                        <input type="password" name="password" id="password" required class="form-control">
                        <span class="eye-icon" id="toggle-password">
                            <i class="fas fa-eye" id="eye-icon"></i>
                        </span>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                    </div>
                    <div class="form-block">
                        <a href="{{ route('password.request') }}" class="btn btn-link">Quên mật khẩu?</a>
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
        right: 20px;
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
</script>
@endsection
