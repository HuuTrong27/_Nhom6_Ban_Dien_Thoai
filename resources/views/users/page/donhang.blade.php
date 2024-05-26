@extends('users.layout')
@section('content')
@section('title','Đơn Hàng')

<table border="1" class="table table-bordered">
    <thead>
        <th>Họ Tên KH</th>
        <th>Email</th>
        <th>Địa Chỉ</th>
        <th>SDT</th>
        <th>Ngày Lập</th>
        <th>Chi Tiết Đơn Hàng</th> <!-- Thêm cột mới cho chi tiết đơn hàng -->
    </thead>
    <tbody>
    @foreach($donhang as $dh )
    <tr>
        <td>{{ isset($dh->name) ? $dh->name : 'N/A' }} </td>
        <td>{{ isset($dh->email) ? $dh->email : 'N/A' }} </td>
        <td>{{ isset($dh->address) ? $dh->address : 'N/A' }} </td>
        <td>{{ isset($dh->phone_number) ? $dh->phone_number : 'N/A' }}</td>
        <td>{{ isset($dh->created_at) ? $dh->created_at : 'N/A' }}</td>
        <td>
            <ul>
                @foreach($dh->bill as $bill)
                    @foreach($bill->bill_detail as $detail)
                        <li>{{ isset($detail->product->name) ? $detail->product->name : 'N/A' }} - Số lượng: {{ $detail->quantity ?? 'N/A' }} - Giá: {{ $detail->price ?? 'N/A' }}</li>
                    @endforeach
                @endforeach
            </ul>
        </td>
    </tr>
@endforeach
    </tbody>
</table>
@endsection
