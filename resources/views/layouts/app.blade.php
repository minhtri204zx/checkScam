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
    </head>

    <body style="position: relative">
        <div class="background-1">
            <header>
                <div class="header-left">
                    <img style="margin-left:40px;width:150px; height:auto;" src="{{ asset('images/logo.png') }}"
                        alt="">
                </div>

                <div class="header-right">
                    <a href="">Trang chủ</a>
                    <a href="">Giới thiệu</a>
                    <a href="">Cảnh báo hình thức lừa đảo</a>
                    <img class="icon" src="{{ asset('images/icon.png') }}" alt="">
                    <button class="btnReport">Report lừa đảo</button>
                </div>
            </header>
            <div class="banner">
                <h1 class="text-center">Check <span>SCA</span></h1>
                <p class="text-center">Tra cứu "SĐT, STK Ngân Hàng..." trước khi giao dịch online. Đây là dữ liệu để
                    cảnh báo không nhắm mục đích bôi nhọ hay hạ thấp uy tín danh dự của bất kì ai, vui lòng liên hệ
                    admin để gỡ thông tin sai sự thật .</p>

                <form action="" method="get" class="text-center">
                    <input type="text" placeholder="Nhập số điện thoại, số tài khoản ngân hàng ...">
                    <button>
                        <div></div>
                        TRA CÍU
                    </button>
                </form>

                <div class="text-center" style="margin-top: 50px">
                    <button class="btnReport">Report lừa đảo</button>
                    <button class="btnReport"
                        style="background: rgba(255, 255, 255, 0.12);backdrop-filter: blur(10px);">
                        Quỹ bảo hiểm</button>
                </div>
            </div>
            <div id="main" class="slide text-light moved">
                @foreach ($cates as $cate)
                    <div id="check{{$loop->iteration}}"  class="main">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="180" height="180" viewBox="0 0 180 180" fill="none">
                            <path d="M0 0H160L180 35V180H20L0 145L0 0Z" fill="url(#pattern0_623_54{{$loop->iteration}})" />
                            <defs>
                                <pattern id="pattern0_623_54{{$loop->iteration}}" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_623_54{{$loop->iteration}}"
                                        transform="translate(-0.166667) scale(0.00277778)" />
                                </pattern>
                                <image id="image0_623_54{{$loop->iteration}}" xlink:href='{{ $cate['image'] }}'>
                            </defs>
                        </svg>
                        <div id="overlay2_{{$loop->iteration}}" class="over overlay2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="164" height="164" viewBox="0 0 164 164"
                                fill="none">
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
                        <div id="overlay1_{{$loop->iteration}}" class="over overlay1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" viewBox="0 0 180 180"
                                fill="none">
                                <path d="M0 0H160.165L180 35V180H19.8347L0 146.142L0 0Z" fill="black"
                                    fill-opacity="0.8" />
                            </svg>
                        </div>
                        <div class="over text">{{ $cate['name'] }}</div>
                    </div>
                @endforeach

            </div>
            <div class="arrow">
                <img id="prev" class="button prev" src="{{asset('images/arrowleft.png')}}" alt="">
                <img id='next' class="button next" src="{{asset('images/arrowright.png')}}" alt="">
            </div>

              <script src="{{asset('js/main.js')}}"></script>
              @yield('content')

            
