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

        </div>

    </body>

    </html>
