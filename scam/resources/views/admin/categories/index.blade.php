@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">

    <h1>Danh sách tài khoản</h1>
    <a href="/admin-categories/create" class="btn btn-success mb-2">Thêm danh mục</a>
    <table class="table table-striped">
        <thead>
            <th>STT</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Chức năng</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td><img src="{{asset('images/games/' . $category->image)}}" style="width: 200px; height:200px" alt="">
                    </td>
                    <td>
                        <div class="d-flex justify-content-between" style="width: 112px;">
                            <a href="/admin-categories/{{$category->id}}/edit" class="btn btn-warning">Sửa</a>
                            <form action="/admin-categories/{{$category->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Bạn muốn xoá danh mục và những bài viết liên quan?')">Xoá</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection