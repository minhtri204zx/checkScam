@extends('admin.layouts.app')
@section('content')
<div class="main pt-3 pb-3">
    <h1>Danh sách bình luận</h1>
    
    <div style="display: flex;">
    <select onchange="loadReports()" class="form-select" name="" id="select">
        <option value="{{request()->fullUrlWithoutQuery(['popular'])}}">Mới nhất</option>
        <option @if (request()->input('popular')=='oldest') selected @endif value="{{request()->fullUrlWithQuery(['popular'=> 'oldest'])}}">Cũ nhất</option>
        <option @if (request()->input('popular')=='popular') selected @endif value="{{request()->fullUrlWithQuery(['popular'=> 'popular'])}}">Phổ biến nhất</option>
    </select>
    <select onchange="loadReports2()" class="form-select" name="" id="select">
        <option value="{{request()->fullUrlWithoutQuery(['post'])}}">Lọc theo bài</option>
        @foreach ($posts as $post)
        <option @if (request()->input('post')==$post->id) selected @endif  value="{{request()->fullUrlWithQuery(['post'=> $post->id])}}">{{$post->id}}</option>
    @endforeach
    </select>
    </div>
    <div style="min-height: 700px">
        <table class="table table-striped">
            <thead>
                <th>Người comments</th>
                <th>Comment của bài viết số</th>
                <th>Nội dung comment</th>
                <th>Lượt thích</th>
                <th>Chức năng</th>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->account->name}}</td>
                        <td>{{$comment->post_id}}</td>
                        <td>{{$comment->comment_content}}</td>
                        <td>{{$comment->like}}</td>
                        <td><button class="btn btn-danger">Xoá</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <?php
    $pages = ceil($comments->total() / 10);
            ?>
    @for ($i = 1; $i <= $pages; $i++)
        <a id="pages" style="<?php
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        if ($_GET['page'] == $i) {
            echo 'background-color: rgba(6, 16, 109, 0.753);color: white;font-weight: 700;';
        } ?>" href="{{request()->fullUrlWithQuery(['page'=>$i])}}">{{ $i }}</a>
    @endfor
</div>
<script>

    function loadReports() {
        let value = document.querySelectorAll('.form-select')
        window.location.href =value[0].value
    }

    function loadReports2() {
        let value = document.querySelectorAll('.form-select')
        window.location.href =value[1].value
    }
</script>
@endsection