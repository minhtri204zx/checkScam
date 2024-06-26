@extends('admin.layouts.app') 
@section('content')

<div class="main pt-3 pb-3">
    <h1>Danh sách người trung gian</h1>
    <a class="btn btn-success mt-3 mb-3" href="/admin-traders/create">Thêm người trung gian</a>
    <div style="min-height: 700px">
        <table class="table table-striped">
            <thead>
                <th>STT</th>
                <th>Tên</th>
                <th>Tựa game</th>
                <th>Ảnh</th>
                <th>Zalo</th>
                <th>Mô tả</th>
                <th>Ngân hàng</th>
                <th>Số tài khoản</th>
                <th>Chức năng</th>
            </thead>
            <tbody>
                @foreach ($traders as $trader)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$trader->fullname}}</td>
                        <td>{{$trader->category->name}}</td>
                        <td><img src="{{asset('images/trader/' . $trader->img)}}" style="width: 120px; height:120px" alt="">
                        </td>
                        <td>{{$trader->zalo}}</td>
                        <td>{{$trader->describe}}</td>
                        <td>{{$trader->bank}}</td>
                        <td>{{$trader->number_bank}}</td>
                        <td>
                            <button class="btn btn-warning">Sửa</button>
                            <button class="btn btn-danger">Xoá</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <?php
$pages = ceil($traders->total() / 4);
            ?>
    @for ($i = 1; $i <= $pages; $i++)
        <a id="pages" style="<?php
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        if ($_GET['page'] == $i) {
            echo 'background-color: rgba(6, 16, 109, 0.753);color: white;font-weight: 700;';
        } ?>" href="/admin-traders?page={{ $i }}">{{ $i }}</a>
    @endfor
</div>
@endsection