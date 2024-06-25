@extends('admin.layouts.app') 

@section('content')

<div class="main pt-3 pb-3">
<h1>Danh sách bài các bài tố cáo</h1>
<div style="display: flex;">
    <select onchange="loadReports()" class="form-select" name="" id="select">
        <option value="{{request()->fullUrlWithoutQuery(['status'])}}">Chủ đề</option>
    @foreach ($statuses as $status)
        <option @if (request()->input('status')==$status->status) selected @endif value="{{request()->fullUrlWithQuery(['status'=> $status->status])}}">{{$status->status}}</option>
    @endforeach
    </select>

    <select onchange="loadReports2()" class="form-select" name="" id="select">
        <option value="{{request()->fullUrlWithoutQuery(['category_id'])}}">Tựa game</option>
        @foreach ($categories as $category)
        <option @if (request()->input('category_id')==$category->category_id) selected @endif  value="{{request()->fullUrlWithQuery(['category_id'=> $category->category_id])}}">{{$category->category->name}}</option>
    @endforeach
    </select>
    
    <select onchange="loadReports3()" class="form-select" name="" id="select">
        <option value="{{request()->fullUrlWithoutQuery(['status_id'])}}">Trạng thái</option>
        @foreach ($currentStatus as $status)
        <option @if (request()->input('status_id')==$status->status_id) selected @endif value="{{request()->fullUrlWithQuery(['status_id'=>$status->status_id])}}">{{$status->current_Status->status}}</option>
    @endforeach
    </select>
</div>
<div style="min-height: 1080px">
<table class="table table-striped">
    <thead>
        <th>STT</th>
        <th>Người phốt</th>
        <th>Tựa game</th>
        <th>Thời gian</th>
        <th>Chủ đề</th>
        <th>Trạng thái</th>
        <th>Cài đặt</th>
    </thead>
    <tbody id="tbody">
        @foreach ($reports as $report)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$report->account->name}}</td>
                <td>{{$report->category->name}}</td>
                <td>{{$report->created_at}}</td>
                <td>

                <span class="badge  bg-<?php if ($report->status =='Phốt') {
                    echo "warning".'" Style = "background: #e9b7ff !important"';
                }else if($report->status =='Scam'){
                    echo 'danger'. '" Style = "background: #ffb171 !important"';
                }?>">{{$report->status}}</span>
                </td>
                <td>
                <span class="badge  bg-<?php if ($report->status_id =='1') {
                    echo "warning";
                }else if($report->status_id =='2'){
                    echo 'danger';
                }else{
                    echo 'success';
                } ?>">{{$report->current_status->status}}</span>
                </td>
                <td>
              <div style="display: flex; justify-content: space-between; width:300px">
                <form action="/posts/{{$report->id}}">
              <button class="btn btn-success">Xem thêm</button>
                </form>
              @if ($report->status_id=='1')
              <form action="/admin/reports/{{$report->id}}" method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="status_id" value="3">
                <input type="submit" value="Duyệt" class="btn btn-warning" onclick="return confirm('Bạn có muốn duyệt?')">
            </form>
                <form action="/admin/reports/{{$report->id}}" method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="status_id" value="2">
                <button class="btn btn-danger" onclick="return confirm('Bạn muốn từ chối?')">Không duyệt</button>
                </form>
              </div>
                @endif</td>

            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div>
            <?php
            $pages = ceil($reports->total() / 16);
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

    function loadReports3() {
        let value = document.querySelectorAll('.form-select')
        window.location.href =value[2].value
    }
</script>
@endsection