@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
@endsection
@section('content')
    <div class="text-center header-detail">
        <img src="{{ asset('images/trader/' . $trader->img) }}" alt="">
        <p>{{ $trader->fullname }}@if ($trader->active == 1)
                <img style="width: 18px; height: 18px; margin-left: 5px;" src="{{ asset('images/active.svg') }}"
                    alt="">
            @endif
        </p>
        <div class="cangiua">
            <div class="contact" style="display: flex">
                <div class="check-trader">
                    <img src="{{ asset('images/Messenger.svg') }}" alt="">
                    <p style=>Check mess</p>
                </div>

                <div class="check-trader">
                    <img src="{{ asset('images/phone.svg') }}" alt="">
                    <p style=>Check phone</p>
                </div>
            </div>
        </div>
    </div>


    <div class="content-detail" style="">

        <div class="cangiua">

            <div class="center-trader">
                <div style="display: flex;">

                    <div class="infor">
                        <p style="color: var(--Light-Stroke, #E4E4E4);">Thông tin liên hệ</p>
                        <p><img src="{{ asset('images/facebook.svg') }}" style="width: 24px; height: 24px;" alt="">Check FB:
                            <a href="https://www.facebook.com/profile.php?id=100069613014818">Link FB</a></p>
                        <p><img src="{{ asset('images/zalo.svg') }}" style="width: 24px; height: 24px;" alt="">Check Zalo:
                            <a href="tel:0984484683">0984484683</a></p>
                        <p><img src="{{ asset('images/web.svg') }}" style="width: 24px; height: 24px;" alt="">Web: <a
                                href="">https://muakey.com</a></p>

                    </div>

                    <div class="infor">
                        <p style="color: var(--Light-Stroke, #E4E4E4);">Quỹ bảo hiểm Muakey</p>
                        <p>Từ ngày 11/07/2023 Khách hàng sẽ được MmoFund.vn bảo hiểm an toàn giao dịch với số tiền trong quỹ bảo
                            hiểm <a href="">3,000,000.vnđ</a> của <a href="">Nguyễn Trường Giang</a></p>
                        @if ($trader->active == 1)
                            <p style="color: #009571"> <img style="width: 18px; height: 18px; margin-left: 5px;"
                                    src="{{ asset('images/active.svg') }}" alt=""> Đã xác thực CMND </p>
                        @endif
                    </div>

                </div>

                <div class="info">

                    <p style="color: var(--Light-Stroke, #E4E4E4);">Mô tả</p>
                    {{ $trader->describe }}

                </div>

                <div class="info">

                    <p style="color: var(--Light-Stroke, #E4E4E4);">Vui lòng kiểm tra kỹ thông tin trước khi giao dịch tránh Fake:
                    </p>
                    <p>TK ngân hàng:</p>
                    <p>MB BANK: <a href="">012312312321</a> - {{ $trader->name }}</p>
                    <p>MB BANK: <a href="">012312312321</a> - {{ $trader->name }}</p>
                    <p>MB BANK: <a href="">012312312321</a> - {{ $trader->name }}</p>
                    <p>MB BANK: <a href="">012312312321</a> - {{ $trader->name }}</p>
                    <p style="color: var(--Light-Stroke, #E4E4E4);">Phí trung gian</p>
                    <p>
                        10.000đ - 99.000đ : phí 3000đ <br>
                        100.000đ - 1.000,000đ : phí 5000đ <br>
                        1.000,000đ - 5.000,000đ : phí 10.000đ <br>
                        5.000,000đ trở lên : Tuỳ phí <br>
                        Lưu Ý: Tránh trường hợp Nick Fake, Ảnh Fake, Link Fake, Rửa Tiền…. Người dùng hãy nhớ Chát đúng Facebook,
                        Gọi đúng SĐT, Chuyển khoản đúng những STK có ở trong trong link bảo hiểm này MmoFund.vn cam kết bạn sẽ an
                        toàn trong mọi giao dịch..!!!
                    </p>

                </div>

                <div class="info" style="border: 1px solid var(--Light-primary, #009571);">

                    Mọi giao dịch của bạn với "{{ $trader->name }}" sẽ được MmoFund.vn Bảo vệ với số tiền nằm trong Quỹ bảo hiểm
                    3,000,000.vnđ khi bạn tuân theo <a href="">Điều Khoản Sử Dụng</a> của MmoFund.vn

                </div>
            </div>

        </div>

    </div>
@endsection
