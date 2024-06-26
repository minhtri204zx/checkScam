@extends('admin.layouts.app') 
@section('content')
<div class="main pt-3 pb-3">
  <h1>Thêm người trung gian</h1>
  <form action="/admin-traders" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" aria-describedby="emailHelp"
        value="{{old('fullname')}}">
      @error('fullname')
      <div style="color: red"> {{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail2" class="form-label">Số tài khoản</label>
      <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="number_bank"
        value="{{old('number_bank')}}">
      @error('number_bank')
      <div style="color: red"> {{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail3" class="form-label">Tên ngân hàng sử dụng</label>
      <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="bank"
        value="{{old('bank')}}">
      @error('bank')
      <div style="color: red"> {{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail4" class="form-label">Mô tả</label>
      <input type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp" name="describe"
        value="{{old('describe')}}">
      @error('describe')
      <div style="color: red"> {{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail5" class="form-label">Zalo - Số điện thoại</label>
      <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp" name="zalo"
        value="{{old('zalo')}}">
      @error('zalo')
      <div style="color: red"> {{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail6" class="form-label">Ảnh đại diện</label>
      <input type="file" class="form-control" id="exampleInputEmail6" aria-describedby="emailHelp" name="img">
      @error('img')
      <div style="color: red"> {{$message}}</div>
    @enderror
    </div>
    <label for="">Có tích xanh hay không <img src="{{asset('images/active.svg')}}"> </label> <br>
    <div class="d-flex justify-content-between mt-3" style="width: 125px;">
      <div class="">
        <input type="radio" value="1" name="active" id=""> <label for="">có</label>
      </div>
      <div>
        <input type="radio" value="0" name="active" id="" checked> <label for="">Không</label> <br>
      </div>
    </div>
    <label for="">Tựa game</label>
    <select name="category_id" class="form-select">
      <option value="">Chưa chọn</option>
      @foreach ($categories as $category)
      <option @if (old('category_id')==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    @error('category_id')
    <div style="color: red"> {{$message}}</div>
  @enderror
    <button type="submit" class="btn btn-primary mt-4">Thêm</button>
  </form>
</div>
@endsection