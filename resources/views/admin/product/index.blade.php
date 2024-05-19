@extends('admin.theme.layout')
@section('content')
<div id="content">
    @if(Session::has('message'))
    <div class="alert alert-success">
      {{ Session::get('message') }}
    </div>
    @endif
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ url(Request::route()->getPrefix()) }}" class="btn btn-primary">Quản lý</a>
        <a href="{{ route('product.create') }}" class="btn btn-success">Thêm mới</a>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Edit</th>
        <th>Lock</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @foreach($products ?? '' as $product)
        <tr>
            <td><img src="{{ asset('images/'. $product->image) }}" width="40" /></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount }}</td>
            <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
            <td><a href="#" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>
            <td>
                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Phân trang  -->
<div class="pagination justify-content-center">
    @if ($products->previousPageUrl())
        <a href="{{ $products->previousPageUrl() }}" class="btn btn-primary">&laquo; Previous</a>
    @endif

    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
        <a href="{{ $url }}" class="btn btn-primary {{ $products->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
    @endforeach

    @if ($products->nextPageUrl())
        <a href="{{ $products->nextPageUrl() }}" class="btn btn-primary">Next &raquo;</a>
    @endif
</div>


@stop

<style>
    .pagination {
        margin-top: 20px;
    }
</style>
