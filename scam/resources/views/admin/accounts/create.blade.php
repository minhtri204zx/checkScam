@extends('admin.layouts.app') 
@section('content')
<div class="main pt-3 pb-3">

    <h1 class="text-center">Thêm tài khoản</h1>
    <form action="/admin-accounts" method="POST">
        @csrf
        <label for="">Tài khoản</label> <br>
        <input class="form-control" type="text" name="name">
        @error('name')
            <div style="color:red">{{$message}}</div>
        @enderror
        <label for="">Tên đầy đủ</label>
        <input type="text" class="form-control" name="fullname">
        @error('fullname')
            <div style="color:red">{{$message}}</div>
        @enderror
        <label for="">Mật khẩu</label> <br>
        <input class="form-control" type="password" name="password">
        @error('password')
            <div style="color:red">{{$message}}</div>
        @enderror
        <button type="submit" style="margin-top: 11px;" class="btn btn-primary">Thêm</button>
    </form>
    @if (session('success'))
        <div class="alert alert-success mt-5" role="alert">
            Thêm thành công
        </div>
    @endif

</div>
@endsection