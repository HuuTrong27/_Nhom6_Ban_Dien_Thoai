@extends('admin.theme.layout')
@section('content')
<table  class="table table-bordered" style="margin-top:20px;">
  <thead>
    <th>Name</th>
    <th>Email</th>
    <th>Content</th>
    <th>Lock</th>
    <th>Delete</th>
  </thead>
  <tbody>
    @foreach($binhluan ?? '' as $bl)
      <tr>
        <td>{{$bl->name}} </td>
        <td>{{$bl->email}} </td>
        <td>{{$bl->content}} </td>
        <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>
        <td>
        <form action="{{route('binhluan.destroy', $bl->id)}}" method="POST">
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
    @if ($binhluan->previousPageUrl())
        <a href="{{ $binhluan->previousPageUrl() }}" class="btn btn-primary">&laquo; Previous</a>
    @endif

    @foreach ($binhluan->getUrlRange(1, $binhluan->lastPage()) as $page => $url)
        <a href="{{ $url }}" class="btn btn-primary {{ $binhluan->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
    @endforeach

    @if ($binhluan->nextPageUrl())
        <a href="{{ $binhluan->nextPageUrl() }}" class="btn btn-primary">Next &raquo;</a>
    @endif
</div>

@stop
