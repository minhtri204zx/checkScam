@extends('layouts.app')
@php
    $menu = true;
@endphp
@section('content')
    <div class="body">
        <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
        <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
        <div class="hanhtinh3_wrapper"><img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}"
                alt=""></div>
        <div class="cangiua">
            <div class="body-con">
                <div class="hanhtinh arrow-up text-center">
                    <img src="{{ asset('images/arrow.png') }}" alt=""> <br>
                    <span class="text-light">Đầu trang</span>
                </div>
                <div class="hanhtinh logomess text-center">
                    <img src="{{ asset('images/messageicon.png') }}" alt=""> <br>
                    <span class="text-light">Hỗ trợ</span>
                </div>
                {{-- start  content --}}

                <div class="contenter" id="contenter">
                    @foreach ($posts as $post)
                        <a href="posts/{{ $post->id }}" class="none">
                            <div class="content">
                                <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên
                                        :</span>
                                    {{ $post->fullname }}</p>
                                <p><img src="{{ asset('images/content/password.svg') }}"
                                        alt=""><span>Username:</span>
                                    {{ $post->username }}</p>
                                <button class="text-center">
                                    Xem chi tiết &nbsp; &nbsp;
                                    <span><img src="{{ asset('images/content/view.svg') }}" alt="">
                                        {{ $post->views($post->id) }}</span>
                                </button>
                                @if ($post->status == 'Phốt')
                                    <img src="{{ asset('images/content/phot.png') }}" alt="">
                                @else
                                    <img src="{{ asset('images/content/scam.png') }}" alt="">
                                @endif
                            </div>
                        </a>
                    @endforeach

                </div>

                <div class="text-center mt-5">
                    <a style="backdrop-filter: blur(10px);" class="btn btn-success" href="/posts">Xem tất cả</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end  content --}}

    {{-- start  banner --}}
    <div class="banner-content">
        <img style="" src="{{ asset('images/banner/banner.png') }}" alt="">
    </div>
    {{-- end  banner --}}

    {{-- start  top comments --}}
    <div class="new-comments">

        <div class="cangiua">
            <div class="new-comment">
                <p>Người Dùng MXH</p> <span>Bình Luận Mới Nhất</span>
            </div>
        </div>
        @foreach ($comments as $comment)
            <div class="new-comment cangiua">
                <p> <img src="{{ $comment->account->avatar }}" alt="">{{ $comment->account->name }}</p>
                <span>{{ $comment->comment_content }}</span>
            </div>
            <hr style="
         border-top: 1px solid #ccc;
    color: #ff0000;
    background-color: #ff0000;
        ">
        @endforeach
    </div>
    {{-- end top comments --}}

    {{-- start community  --}}

    <div class="body" id="nomargin">
        {{-- start  content --}}
        <div class="cangiua">
            <div class="body-con">
                <h2 class="text-light">Cộng Đồng Valorant</h2>
                <div class="contenter">
                    @foreach ($posts as $post)
                        <a class="none" href="">
                            <div class="content">
                                <p><img src="{{ asset('images/games/game2.png') }}" alt=""><span>VALORANT: Chợ dời
                                        -
                                        Trao đổi mua bán tài khoản (PC) VN</span></p>
                                <p>Công khai · 58K thành viên · Hơn 10 bài viết/ngày</p>
                                <p class="link" style="color: var(--Blue, #0989ff);" href="">
                                    https://www.facebook.com/groups/valorant.traodoi.muaban
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    {{-- end community  --}}

    {{-- start outstanding --}}

    <div class="noibat">
        <div class="cangiua">
            <div class="overlay-noibat">
                <h1 class="text-center">Tính năng nổi bật</h1>
                <p>Các tin tức nổi bật về tình trạng scam hiện nay. Hãy đọc tin tức để phòng hờ các kẻ xấu lợi dụng scam</p>
                <div class="check">
                    <div class="check-left">
                        <img src="{{ asset('images/content/nutv.svg') }}" alt="">
                        <h3>Check scammer</h3>
                        <p>Bạn chỉ cần nhập SDT, STK ngân hàng, thông tin của scammer vào trong ô tìm kiếm sẽ được phơi bày
                        </p>
                        <a href="" class="btn btn-success">Report lừa đảo</a>
                    </div>

                    <div class="check-left">
                        <img src="{{ asset('images/content/nutv.svg') }}" alt="">
                        <h3>Quỹ bảo hiểm</h3>
                        <p>Bạn muốn report một ai đó đang lừa đảo bạn ,đã đủ chứng cứ để kẻ lừa đảo phải chịu hình phạt</p>
                        <a href="" class="btn btn-success">Quỹ bảo hiểm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- end outstanding --}}
    <script>
        const pos = document.querySelectorAll('.none');
        window.addEventListener('resize', () => {
            if (screen.width <= 1111) {
                for (let index = 0; index < pos.length; index++) {
                    if ((index >= 6 && index < 12) || (index > 17 && index < 25)) {
                        pos[index].style.display = 'none';
                    }
                }
            } else {
                for (let index = 0; index < pos.length; index++) {
                    pos[index].style.display = 'block';
                }
                menu.style.display = 'none'
            }
        })
    </script>
@endsection
