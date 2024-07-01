@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <h1 class="text-center">Thêm nhóm facebook</h1>
    <form action="/admin-communities" method="post" class="mt-5" enctype="multipart/form-data">
        @csrf
        <label class="mt-3" for="">Tên </label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
        @error('name')
            <div style="color:red">{{$message}}</div>
        @enderror

        <label class="mt-3" for="">Thông tin (số thành viên - số bài viết 1 ngày) </label>
        <input type="text" name="infor" class="form-control " value="{{old('infor')}}">
        @error('infor')
            <div style="color:red">{{$message}}</div>
        @enderror
        <label class="mt-3" for="">Link </label>
        <input type="text" name="link" class="form-control " value="{{old('link')}}">
        @error('link')
            <div style="color:red">{{$message}}</div>
        @enderror
        <label class="mt-3" for="">Ảnh</label>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="inputGroupFile03" value="{{old('image')}}"
                aria-describedby="inputGroupFileAddon03" aria-label="Upload">
        </div>
        @error('image')
            <div style="color:red">{{$message}}</div>
        @enderror
        <button class="btn btn-primary">Thêm</button>
    </form>
    @if (session('success'))
        <div class="alert alert-success mt-5" role="alert">
            Thêm thành công
        </div>
    @endif
</div>
@endsection