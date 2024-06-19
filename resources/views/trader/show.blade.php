@extends('layouts.app')

@section('content')

<div class="text-center header-detail">
    <img src="{{$trader->img}}" alt="">
    <p>{{$trader->name}}@if ($trader->active==1)<img style="width: 18px; height: 18px; margin-left: 5px;" src="{{asset('images/active.svg')}}" alt="">@endif</p>
    <div style="display: flex">
        <div style="display: flex; border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 100px; width: 180px; padding: 0px 24px; margin-left:760px;">
        <img src="{{asset('images/Messenger.svg')}}" alt="">
        <p style="margin-top: 16px; margin-left: 8px;">Check mess</p>
        </div>

        <div style="display: flex; border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 100px; width: 180px; padding: 0px 24px; margin-left:30px;">
            <img src="{{asset('images/phone.svg')}}" alt="">
            <p style="margin-top: 16px; margin-left: 8px;">Check phone</p>
            </div>
    </div>
</div>

<div class="content-detail" style="padding-left: 400px; padding-top: 30px;">
<div style="display: flex;">

    <div class="infor">
        <p style="color: var(--Light-Stroke, #E4E4E4);">Thông tin liên hệ</p>
        <p><img src="{{asset('images/facebook.svg')}}" style="width: 24px; height: 24px;" alt="">Check FB: <a href="">Link FB</a></p>
        <p><img src="{{asset('images/zalo.svg')}}" style="width: 24px; height: 24px;" alt="">Check Zalo: <a href="">0123456789</a></p>
        <p><img src="{{asset('images/web.svg')}}" style="width: 24px; height: 24px;" alt="">Web: <a href="">https://muakey.com</a></p>

    </div>

    <div class="infor" style="margin-left: 24px;">
        <p style="color: var(--Light-Stroke, #E4E4E4);">Quỹ bảo hiểm Muakey</p>
        <p>Từ ngày 11/07/2023 Khách hàng sẽ được MmoFund.vn bảo hiểm an toàn giao dịch với số tiền trong quỹ bảo hiểm <a href="">3,000,000.vnđ</a> của <a href="">Nguyễn Trường Giang</a></p>
        @if ($trader->active==1)
        <p style="color: #009571"> <img style="width: 18px; height: 18px; margin-left: 5px;" src="{{asset('images/active.svg')}}" alt=""> Đã xác thực CMND </p>

        @endif
    </div>

</div >

<div class="info">

    <p style="color: var(--Light-Stroke, #E4E4E4);">Mô tả</p>
    {{$trader->describe}}

</div>

<div class="info">

    <p style="color: var(--Light-Stroke, #E4E4E4);">Vui lòng kiểm tra kỹ thông tin trước khi giao dịch tránh Fake:</p>
    <p>TK ngân hàng:</p>
    <p>MB BANK: <a href="">012312312321</a> - {{$trader->name}}</p>
    <p>MB BANK: <a href="">012312312321</a> - {{$trader->name}}</p>
    <p>MB BANK: <a href="">012312312321</a> - {{$trader->name}}</p>
    <p>MB BANK: <a href="">012312312321</a> - {{$trader->name}}</p>
    <p style="color: var(--Light-Stroke, #E4E4E4);">Phí trung gian</p>
    <p>
        10.000đ - 99.000đ : phí 3000đ <br>
100.000đ - 1.000,000đ : phí 5000đ <br>
1.000,000đ - 5.000,000đ : phí 10.000đ <br>
5.000,000đ trở lên : Tuỳ phí <br>
Lưu Ý: Tránh trường hợp Nick Fake, Ảnh Fake, Link Fake, Rửa Tiền…. Người dùng hãy nhớ Chát đúng Facebook, Gọi đúng SĐT, Chuyển khoản đúng những STK có ở trong trong link bảo hiểm này MmoFund.vn cam kết bạn sẽ an toàn trong mọi giao dịch..!!!
    </p>

</div>

<div class="info" style="border: 1px solid var(--Light-primary, #009571);">

    Mọi giao dịch của bạn với "{{$trader->name}}" sẽ được MmoFund.vn Bảo vệ với số tiền nằm trong Quỹ bảo hiểm 3,000,000.vnđ khi bạn tuân theo <a href="">Điều Khoản Sử Dụng</a> của MmoFund.vn

</div>

</div>

@endsection
