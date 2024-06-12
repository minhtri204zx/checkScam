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
    <?php

    if (!Auth::check()) {?>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')
        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script><?php
    }

    ?>

    @if (!Auth::check())
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #0d0d0d">Thông báo!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 style="color: #0d0d0d">Bạn chưa đăng nhập</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            style="color: white">Close</button>
                        <a style="color: white" href="http://localhost:8000/login" class="btn btn-primary"><i
                                class="fa-brands fa-facebook"></i> &nbsp;Login with facebook</a>
                    </div>
                </div>
            </div>
        </div>
    @endif



    <div class="cangiua">
        <div class="cangiua">
            <div id="menuMobile" class="menu-mobile" style="background-color: #111111">
                <i id="outMenu" class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                <br>
                <ul>
                    <li>
                        <a style="text-decoration: none; color:#ffffff" href="/">Trang chủ</a>
                    </li>
                    <li>
                        <a style="text-decoration: none; color:#ffffff" href="/">Giới thiệu</a>
                    </li>
                    <li>
                        <a style="text-decoration: none; color:#ffffff" href="/">Cảnh báo hình thức lừa đảo</a>
                    </li>
                    <li style="margin-left: -20px; margin-top: 20px;">
                        <a style="text-decoration: none; color:#ffffff" class="btnReport"
                            @if (!Auth::check()) data-bs-toggle="modal" data-bs-target="#exampleModal" @else href="/posts/create" @endif>Report
                            lừa
                            đảo</a>
                        @auth
                            <a style="text-decoration: none; color:#ffffff" href="/logout" class="btnReport">Đăng xuất</a>
                        @endauth
                    </li>
                </ul>
            </div>
            <header>
                <div class="header-left">
                    <img id="home" style="width: 150px; height: auto; margin-left: 15px;"
                        src="{{ asset('images/logo.png') }}" alt="">
                </div>
                <div id="showmenu" class="header-right-mobile">
                    <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
                </div>
                <div id="header" class="header-right<?php if (Auth::check()) {
                    echo '2';
                } ?>">
                   <div>
                    <a href="/">Trang chủ</a>
                    <a href="">Giới thiệu</a>
                    <a href="">Cảnh báo hình thức lừa đảo</a>
                   </div>
                   <div>
                    <img class="icon" src="{{ asset('images/icon.png') }}" alt="">
                    <a class="btnReport"
                        @if (!Auth::check()) data-bs-toggle="modal" data-bs-target="#exampleModal" @else href="/posts/create" @endif>Report
                        lừa
                        đảo</a>
                    @auth
                        <a href="/logout" class="btnReport">Đăng xuất</a>
                    @endauth
                   </div>
                </div>
            </header>
        </div>
        <hr
            style="
    border: 0;
 height: 0.5px; /* Đặt chiều cao của thẻ hr */
 background-color: white; /* Đặt màu nền */
 border-top: 0.5px solid white; /* Đặt màu và độ dày của viền trên */
 margin: 10px 0; /* Khoảng cách trên và dưới thẻ hr */
    ">

        @yield('content')

        {{-- start footer --}}

        <div class="footer" id="footer"
        @isset($home)
        style="
margin-top: 730px;
        "
    @endisset>
        <div class="div row">
            <div class="footer1 col-xxl-2 col-sm-6">
                <img src="{{ asset('images/logo.png') }}" alt="">
                <p>Ở đâu có tình thương, ở đó có sự sống. Ở đâu có công lí, ở đó có sự sống. Ở đâu có tội ác, ở
                    đó có công lí. Ở đâu có sự sống, ở đó có công lí.</p>
            </div>
            <div class="footer2 col-xxl-2 col-sm-6">
                <h5 style="color: white">Yêu cầu gỡ report</h5>
                <p>Telegram: @hotro</p>
                <p>Email: abc@gmail.com</p>
                <p>Thời gian làm việc: 8h - 23h</p>
            </div>
            <div class="footer3 col-xxl-4 col-sm-6">
                <h5 style="color: white">Trang chủ</h5>
                <p>Giới thiệu</p>
                <p>Điều khoản dịch vụ</p>
                <p>Chính sách bảo mật</p>
            </div>
            <div class="footer4 col-xxl-2 col-sm-2">
                <h5 style="color: white">Cộng đồng</h5>
                <div style="display: flex">
                    <img src="{{ asset('images/content/facebook.svg') }}" alt="">
                    <img style="margin-left: 12px" src="{{ asset('images/content/youtube.svg') }}"
                        alt="">
                    <img style="margin-left: 12px" src="{{ asset('images/content/tiktok.svg') }}"
                        alt="">
                    <img style="margin-left: 12px" src="{{ asset('images/content/tele.svg') }}"
                        alt="">
                </div>
            </div>
            <div class="footer5 col-xxl-1 col-sm-3">
                <img src="{{ asset('images/content/DMCA.png') }}" alt="">
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
