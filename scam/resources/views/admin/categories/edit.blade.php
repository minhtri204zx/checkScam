@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <h1>Sửa danh mục</h1>
    <form action="/admin-categories/{{$category->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="detail mt-3">
            <label style="min-width:140px" for="">Tên danh mục</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
            @error('name')
                <div style="color: red"> {{$message}}</div>
            @enderror
        </div>

        <div class="detail mt-3">
            <label style="min-width:140px" for="">Hình ảnh</label>
            <img src="{{asset('images/games/' . $category->image)}}" style="width:200px; height:200px"
                class="rounded mx-auto d-block" alt="...">
        </div>
        <input type="file" class="form-control mt-3" name="image">
        <button class="btn btn-success mt-3">Sửa</button>
    </form>
    @if (session('success'))
        <div class="alert alert-success mt-5" role="alert">
            Sửa thành công
        </div>
    @endif
</div>
@endsection