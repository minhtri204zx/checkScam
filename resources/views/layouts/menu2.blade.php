<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @yield('link')
</head>

<body style="background-color: #0d0d0d">
    <header>
        <div class="header-left">
            <img id="home" style="margin-left:40px;width:150px; height:auto" src="{{ asset('images/logo.png') }}"
                alt="">
        </div>
        <div id="header" class="header-right">
            <a href="/">Trang chủ</a>
            <a href="">Giới thiệu</a>
            <a href="">Cảnh báo hình thức lừa đảo</a>
            <img class="icon" src="{{ asset('images/icon.png') }}" alt="">
            <a class="btnReport"
                @if (!Auth::check()) data-bs-toggle="modal" data-bs-target="#exampleModal" @else href="/report" @endif>Report
                lừa
                đảo</a>
            @auth
                <a href="logout" class="btnReport">Đăng xuất</a>
            @endauth
        </div>


    </header>
    <hr
        style="
    border: 0;
 height: 0.5px; /* Đặt chiều cao của thẻ hr */
 background-color: white; /* Đặt màu nền */
 border-top: 0.5px solid white; /* Đặt màu và độ dày của viền trên */
 margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
    ">

    <script src="{{ asset('js/main.js') }}"></script>

    @yield('content')

    {{-- start footer --}}

    <div style="margin-top: 100px" class="footer">
        <hr
            style="
            border: 0;
         height: 0.5px; /* Đặt chiều cao của thẻ hr */
         background-color: white; /* Đặt màu nền */
         border-top: 0.5px solid white; /* Đặt màu và độ dày của viền trên */
         margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
            ">
        <div class="div">
            <div class="footer1">
                <img src="{{ asset('images/logo.png') }}" alt="">
                <p>Ở đâu có tình thương, ở đó có sự sống. Ở đâu có công lí, ở đó có sự sống. Ở đâu có tội ác, ở
                    đó có công lí. Ở đâu có sự sống, ở đó có công lí.</p>
            </div>
            <div class="footer2">
                <h5 style="color: white">Yêu cầu gỡ report</h5>
                <p>Telegram: @hotro</p>
                <p>Email: abc@gmail.com</p>
                <p>Thời gian làm việc: 8h - 23h</p>
            </div>
            <div class="footer3">
                <h5 style="color: white">Trang chủ</h5>
                <p>Giới thiệu</p>
                <p>Điều khoản dịch vụ</p>
                <p>Chính sách bảo mật</p>
            </div>
            <div class="footer4">
                <h5 style="color: white">Cộng đồng</h5>
                <div style="display: flex">
                    <img src="{{ asset('images/content/facebook.svg') }}" alt="">
                    <img style="margin-left: 12px" src="{{ asset('images/content/youtube.svg') }}" alt="">
                    <img style="margin-left: 12px" src="{{ asset('images/content/tiktok.svg') }}" alt="">
                    <img style="margin-left: 12px" src="{{ asset('images/content/tele.svg') }}" alt="">
                </div>
            </div>
            <div class="footer5">
                <img style="margin-left: 24px " src="{{ asset('images/content/DMCA.png') }}" alt="">
            </div>
        </div>
        <div>
            <hr
                style="
                        height: 2px;
                        background-color: 232323;
                        border-top: 2px solid 232323;">
        </div>
        <p style="color: var(--Light-White, #B5AB9A); text-align: center; margin-top: 30px;">© Copyright 2023.
            All rights reserved</p>
    </div>

    {{-- end footer --}}
</body>
