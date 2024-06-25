@extends('admin.layouts.app') 
@section('content')
<div class="main pt-3 pb-3">
    <h1>Danh sách tài khoản</h1>

    <div style="min-height: 1080px">

        <table class="table table-striped">
            <thead>
                <th>Tên tài khoản</th>
                <th>Phương thức đăng nhập</th>
                <th>Số điện thoại</th>
                <th>Chức vụ</th>
                <th>Tình trạng</th>
                <th>Thao tác</th>

            </thead>

            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{$account->name}}</td>
                        <td>{{$account->uid ? 'Facebook' : 'Google'}}</td>
                        <td>{{$account->numberphone ? '$account->numberphone' : 'Chưa xác thực số điện thoại'}}</td>
                        <td>{{$account->role_id == 2 ? 'Admin' : 'Người dùng'}}</td>
                        <td>{{$account->ban == 1 ? 'Bị khoá' : 'Không khoá'}}</td>
                        <td>
                                @if ($account->ban == 1)
                                    <form action="/admin-accounts/update/{{$account->id}}" method="Post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="ban" value="0">
                                        <button class="btn btn-success">Ân xá</button>
                                    </form>
                                @else
                                <form action="/admin-accounts/update/{{$account->id}}" method="Post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="ban" value="1">
                                    <button class="btn btn-danger">Ban</button>
                                </form>
                                @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <?php
            $pages = ceil($accounts->total() / 16);
            ?>
            @for ($i = 1; $i <= $pages; $i++)
                <a id="pages" style="<?php
                if (!isset($_GET['page'])) {
                    $_GET['page'] = 1;
                }
                if ($_GET['page'] == $i) {
                    echo 'background-color: rgba(6, 16, 109, 0.753);color: white;font-weight: 700;';
                } ?>"
                    href="/admin?page={{ $i }}">{{ $i }}</a>
            @endfor
</div>



@endsection