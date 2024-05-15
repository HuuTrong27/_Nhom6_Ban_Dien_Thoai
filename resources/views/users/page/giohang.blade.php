@extends('users.layout')
@section('title','Giỏ Hàng')
@section('content')
    <div class="">
        <div class="span9">
            <h4 class="title" style="text-align: center"><span class="text"><strong>Giỏ Hàng</strong> Của Bạn </span></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Tên Sản Phẩm </th>
                        <th>Hình </th>
                        <th> Giá Tiền </th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has('cart') && count($product_cart) > 0) <!-- Kiểm tra nếu giỏ hàng có sản phẩm -->
                        @foreach($product_cart as $product)
                            <tr>
                                <td>{{$product['item']['name']}}</td>
                                <td><img alt="" style="height: 250px" src="images/{{$product['item']['image']}}"></td>
                                <td>{{$product['qty']}}*<span>@if($product['item']['discount']==0){{number_format($product['item']['price'])}} @else {{number_format($product['item']['discount'])}}@endif</td>
                                <td>
                                    <div class="cart-item">
                                        <a href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-trash" style="text-align: center; font-size:20px"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Tổng Tiền: &emsp;<strong>{{number_format($totalPrice)}} đồng</strong></td>
                            <td>
                                <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                &emsp;<a href="{{route('trang-chu')}}" class="beta-btn primary text-center">Tiếp Tục Mua Hàng <i class="fa fa-chevron-right"></i></a>
                            </td>
                        </tr>
                    @else <!-- Nếu giỏ hàng không có sản phẩm -->
                        <tr>
                            <td colspan="4" style="text-align: center;"><strong>Giỏ hàng của bạn đang trống</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <a href="{{route('trang-chu')}}" class="beta-btn primary text-center">Tiếp Tục Mua Hàng <i class="fa fa-chevron-right"></i></a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
