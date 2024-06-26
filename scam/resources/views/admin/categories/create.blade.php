@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <div style="width:300px; margin:0 auto">
        <h1>Thêm danh mục</h1>
        <form action="/admin-categories" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="">Tên danh mục</label> <br>
            <input class="form-control" type="text" name="name">
            @error('name')
                <div style="color:red">{{$message}}</div>
            @enderror
            <label for="">Ảnh danh mục</label> <br>
            <div class="input-group mb-3">
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
            </div>
            @error('image')
                <div style="color:red">{{$message}}</div>
            @enderror
            <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>a
@endsection