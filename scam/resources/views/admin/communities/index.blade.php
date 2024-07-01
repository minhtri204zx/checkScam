@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <h1>Cộng đồng game</h1>
    @if (session('success'))
        <div class="alert alert-danger mt-5" role="alert">
            Xoá thành công
        </div>
    @endif
    <a href="/admin-communities/create" class="btn btn-success mt-2 mb-1">Thêm</a>
    <div style="min-height: 700px">
        <table class="table">
            <thead>
                <th>STT</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Thông tin</th>
                <th>Link</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                @foreach ($communities as $community)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$community->name}}</td>
                        <td><img style="width: 150px; height:150px"
                                src="{{asset('images/communities/' . $community->image)}}" alt=""></td>
                        <td>{{$community->infor}}</td>
                        <td><a href="{{$community->link}}">Link</a></td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 108px">
                                <form action="/admin-communities/{{$community->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Bạn coá muốn xoá?')">Xoá</button>
                                </form>
                                <a href="/admin-communities/{{$community->id}}/edit" class="btn btn-warning">Sửa</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <?php
$pages = ceil($communities->total() / 5);
            ?>
    @for ($i = 1; $i <= $pages; $i++)
        <a id="pages" style="<?php
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        if ($_GET['page'] == $i) {
            echo 'background-color: rgba(6, 16, 109, 0.753);color: white;font-weight: 700;';
        } ?>" href="{{request()->fullUrlWithQuery(['page' => $i])}}">{{ $i }}</a>
    @endfor
</div>
@endsection