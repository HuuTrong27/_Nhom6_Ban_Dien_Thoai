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
        <a href="{{route('category.create')}}" class="btn btn-success">Thêm mới</a>
    </div>
</div>
<table  class="table table-bordered" style="margin-top:20px;">
  <thead>
    <th>Image</th>
    <th>Name</th>
    <th>Description</th>
    <th>Content</th>
    <th>View product</th>
    <th>Edit</th>
    <th>Lock</th>
    <th>Delete</th>
  </thead>
  <tbody>
    @foreach($cate ?? '' as $category)
      <tr>
        <td><img src="{{asset('images/'. $category->image)}}" width="60px" /></td>
        <td>{{$category->name}} </td>
        <td>{!!$category->description!!} </td>
        <td>{!!$category->content!!} </td>
        <td><a href="{{route('category.productlist', $category->id)}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a></td>
        <td><a href="{{route('category.edit', $category->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
        <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>
        <td>
        <form action="{{route('category.destroy', $category->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td>

        </form>
      </tr>
      @endforeach
  </tbody>
</table>
<!-- Phân trang  -->
<div class="pagination justify-content-center">
    @if ($cate->previousPageUrl())
        <a href="{{ $cate->previousPageUrl() }}" class="btn btn-primary">&laquo; Previous</a>
    @endif

    @foreach ($cate->getUrlRange(1, $cate->lastPage()) as $page => $url)
        <a href="{{ $url }}" class="btn btn-primary {{ $cate->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
    @endforeach

    @if ($cate->nextPageUrl())
        <a href="{{ $cate->nextPageUrl() }}" class="btn btn-primary">Next &raquo;</a>
    @endif
</div>
@stop
