@extends('users.layout')
@section('title', 'Đặt lại mật khẩu')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt lại mật khẩu</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('trang-chu') }}">Home</a> / <span>Đặt lại mật khẩu</span>
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
            </div>

            <form action="{{ route('password.update') }}" method="post" class="beta-form-checkout">
                {{ csrf_field() }}
                <div class="col-sm-3"></div>

                <div class="col-sm-6">
                    <h4>Đặt lại mật khẩu</h4>
                    <div class="space20">&nbsp;</div>
                    
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="form-block">
                        <label for="verification_code">Mã xác nhận:</label>
                        <input type="text" name="verification_code" required>
                    </div>
                    <div class="form-block position-relative">
                        <label for="password">Mật khẩu mới*</label>
                        <input type="password" name="password" id="password" required>
                        <span class="eye-icon" id="toggle-password">
                            <i class="fas fa-eye" id="eye-icon"></i>
                        </span>
                    </div>
                    <div class="form-block position-relative">
                        <label for="password_confirmation">Xác nhận mật khẩu mới*</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                        <span class="eye-icon" id="toggle-confirm-password">
                            <i class="fas fa-eye" id="confirm-eye-icon"></i>
                        </span>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </form>
        </div> <!-- .login-form -->
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

document.getElementById('toggle-confirm-password').addEventListener('click', function () {
    var confirmPasswordField = document.getElementById('password_confirmation');
    var confirmEyeIcon = document.getElementById('confirm-eye-icon');
    if (confirmPasswordField.type === 'password') {
        confirmPasswordField.type = 'text';
        confirmEyeIcon.classList.remove('fa-eye');
        confirmEyeIcon.classList.add('fa-eye-slash');
    } else {
        confirmPasswordField.type = 'password';
        confirmEyeIcon.classList.remove('fa-eye-slash');
        confirmEyeIcon.classList.add('fa-eye');
    }
});
</script>
@endsection
