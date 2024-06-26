@extends('admin.layouts.app') 

@section('content')

<div class="main pt-3 pb-3" style="line-height: 2;">
    <h1>Chi tiết bài viết</h1>
    <div class="detail">
        <p>Danh mục :</p>
        <p>{{$post->category->name}}</p>
    </div>
    <div class="detail">
        <p>Username :</p>
        <p>{{$post->username}}</p>
    </div>
    <div class="detail">
        <p>UID :</p>
        <p>{{$post->UID}}</p>
    </div>
    <div class="detail">
        <p>Link bài viết report :</p>
        <p><a href="{{$post->linkfb}}">{{$post->linkfb}}</a></p>
    </div>
    <div class="detail">
        <p>Họ và tên :</p>
        <p>{{$post->fullname}}</p>
    </div>
    <div class="detail">
        <p>Số điện thoại :</p>
        <p>{{$post->numberphone}}</p>
    </div>
    <div class="detail">
        <p>Số tài khoản ngân hàng :</p>
        <p>{{$post->numberbank}}</p>
    </div>
    <div class="detail">
        <p>Ngân hàng :</p>
        <p>{{$post->namebank}}</p>
    </div>
    <div class="detail">
        <p>Ảnh chụp bằng chứng :</p>
        <p>
        <div class="images">
            @php
                $images = json_decode($post->images)
            @endphp
            @if (is_array($images))
                @foreach ($images as $image)
                    <div class="image-container">
                        <img src="{{asset('images/' . $image)}}" onclick="largeImg({{$loop->index}})"
                            id="imageDisplay{{$loop->index}}" style="margin-top: 0px" alt="Image" class="image2">
                    </div>
                @endforeach

            @else
                <p class="noidung">Không có ảnh</p>
            @endif
        </div>
        </p>
        
    </div>
    <div class="detail">
        <p>Nội dung report :</p>
        <p>{{$post->content}}</p>
    </div>
    <div class="detail">
        <p>Trạng thái :</p>
        <p><span class="badge  bg-<?php if ($post->status_id =='1') {
                    echo "warning";
                }else if($post->status_id =='2'){
                    echo 'danger';
                }else{
                    echo 'success';
                } ?>">{{$post->current_status->status}}</span></p>
    </div>
  
    <div style="display: flex; width: 290px; justify-content: space-between;">
    @if ($post->status_id=='1')
    <form action="/admin/reports/{{$post->id}}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="status_id" value="3">
            <input type="submit" value="Duyệt" class="btn btn-success" onclick="return confirm('Bạn có muốn duyệt?')">
        </form>
        <form action="/admin/reports/{{$post->id}}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="status_id" value="2">
            <button class="btn btn-info" onclick="return confirm('Bạn muốn từ chối?')">Không duyệt</button>
        </form>
        @endif
       
       
        <form action="/admin-reports/destroy/{{$post->id}}" method="POST">
                    @csrf
                    @method('delete')
                <button class="btn btn-danger" onclick="return confirm('Bạn muốn xoá bài viết này?')">Xoá bài viết</button>
                </form> 
    </div>
</div>

<script src="{{asset('js/img.js')}}"></script>
<div class="image_overlay" id="over"></div>

@endsection