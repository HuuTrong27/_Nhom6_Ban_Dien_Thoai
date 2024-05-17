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
                <a href="index.html">Home</a> / <span>Đặt lại mật khẩu</span>
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
                        <label for="verification_code">Verification Code:</label>
                        <input type="text" name="verification_code" required>
                    </div>
                    <div class="form-block">
                        <label for="password">Mật khẩu mới*</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="form-block">
                        <label for="password_confirmation">Xác nhận mật khẩu mới*</label>
                        <input type="password" name="password_confirmation" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
