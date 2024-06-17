    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Scam')</title>
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
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        @yield('link')
    </head>

    <body style="position: relative">
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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Bạn chưa đăng nhập</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="http://localhost:8000/login" class="btn btn-primary"><i
                                class="fa-brands fa-facebook"></i> &nbsp;Login with facebook</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel3">Thông báo!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Bạn đã hết số lần comment ngày hôm nay</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="http://localhost:8000/login" data-bs-dismiss="modal" class="btn btn-primary">&nbsp;Vẫn
                            là đóng nhưng màu xanh</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="background<?php if (isset($tracuu)) {
            echo '-3';
        } else {
            echo '-1';
        } ?>">
            <div class="ac">
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
                            <img id="home" style="width:150px; height:auto"
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
                           <div class="btn-report">
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
            </div>

            @isset($menu)

                <div class="banner">

                    <h1 class="text-center">@yield('check', 'Check') <span>@yield('sca', 'SCA')</span></h1>
                    <p class="text-center">@yield(
                        'infor',
                        'Tra cứu "SĐT, STK Ngân Hàng..." trước khi giao dịch online. Đây là dữ liệu để
                        cảnh báo không nhắm mục đích bôi nhọ hay hạ thấp uy tín danh dự của bất kì ai, vui lòng liên hệ
                        admin để gỡ thông tin sai sự thật .'
                    )</p>

                    <form action="posts" method="get" class="text-center" style="position: relative">
                        <input type="text" id="search" value="{{ request()->search }}" name="search"
                            onkeyup="debounceShowHints(event, this.value)"
                            placeholder="Nhập số điện thoại, số tài khoản ngân hàng ...">
                        <button type="submit">
                            <div id="btndiv"></div>
                            TRA CÍU
                        </button>
                    </form>

                    <div class="text-center" style="margin-top: 50px">
                        <button class="btnReport">Report lừa đảo</button>
                        <a href="/insurance" class="btnReport"
                            style="background: rgba(255, 255, 255, 0.12); text-decoration: none; padding: 14px 30px ">
                            Quỹ bảo hiểm</a>
                    </div>
                </div>
                <div class="canimg">
                    <div id="search2">
                    </div>
                </div>

                <div class="cangiua">
                    <div id="main" class="slide text-light moved">
                        @foreach ($cates as $cate)
                            <div id="check{{ $loop->iteration }}" class="main">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="180" height="180" viewBox="0 0 180 180" fill="none">
                                    <path d="M0 0H160L180 35V180H20L0 145L0 0Z"
                                        fill="url(#pattern0_623_54{{ $loop->iteration }})" />
                                    <defs>
                                        <pattern id="pattern0_623_54{{ $loop->iteration }}"
                                            patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_623_54{{ $loop->iteration }}"
                                                transform="translate(-0.166667) scale(0.00277778)" />
                                        </pattern>
                                        <image id="image0_623_54{{ $loop->iteration }}" xlink:href='{{ $cate['image'] }}'>
                                    </defs>
                                </svg>
                                <div id="overlay2_{{ $loop->iteration }}" class="over overlay2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="164" height="164"
                                        viewBox="0 0 164 164" fill="none">
                                        <path
                                            d="M0.5 0.501733L143.14 0.500003L163.5 33.2858V163.5L18.8828 163.501L0.5 128.734V0.501733Z"
                                            stroke="url(#paint0_linear_623_546)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_623_546" x1="82" y1="0"
                                                x2="82" y2="164.001" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#6A6967" stop-opacity="0.6" />
                                                <stop offset="0.330452" stop-color="#B5AB9A" stop-opacity="0" />
                                                <stop offset="0.637217" stop-color="#B5AB9A" stop-opacity="0" />
                                                <stop offset="1" stop-color="#5A5A58" stop-opacity="0.6" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div id="overlay1_{{ $loop->iteration }}" class="over overlay1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180"
                                        viewBox="0 0 180 180" fill="none">
                                        <path d="M0 0H160.165L180 35V180H19.8347L0 146.142L0 0Z" fill="black"
                                            fill-opacity="0.8" />
                                    </svg>
                                </div>
                                <div class="over text">{{ $cate['name'] }}</div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="cangiua">
                    <div class="arrow">
                        <img id="prev" class="button prev" src="{{ asset('images/arrowleft.png') }}"
                            alt="">
                        <img id='next' class="button next" src="{{ asset('images/arrowright.png') }}"
                            alt="">
                    </div>
                </div>
            @endisset

            <script src="{{ asset('js/main.js') }}"></script>
            @yield('content')

            {{-- start footer --}}

            <div class="footer" id="footer">
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
<script src="{{ asset('js/posts.js') }}"></script>
            </div>

            {{-- end footer --}}
