@extends('users.layout')
@section('title','Xác nhận OTP')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Xác nhận OTP</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Xác nhận OTP</span>
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

            <form action="{{ route('verify.otp') }}" method="post" class="beta-form-checkout">
                {{ csrf_field() }}
                <div class="col-sm-3"></div>

                <div class="col-sm-6">
                    <h4>Xác nhận OTP</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="otp">OTP*</label>
                        <input type="text" name="otp" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
