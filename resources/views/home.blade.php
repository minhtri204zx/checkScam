@extends('layouts.app');
@section('content')
    <div class="body">
        <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
        <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
        <img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}" alt="">
        <div class="hanhtinh arrow-up text-center">
            <img src="{{ asset('images/arrow.png') }}" alt=""> <br>
            <span class="text-light">Đầu trang</span>
        </div>
        <div class="hanhtinh logomess text-center">
            <img src="{{ asset('images/messageicon.png') }}" alt=""> <br>
            <span class="text-light">Hỗ trợ</span>
        </div>
        {{-- start  content --}}
        <div class="contenter">
            @foreach ($posts as $post)
                <div class="content">
                    <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên :</span>
                        {{ $post->fullname }}</p>
                    <p><img src="{{ asset('images/content/password.svg') }}" alt=""><span>Username:</span>
                        {{ $post->username }}</p>
                    <button class="text-center">
                        Xem chi tiết &nbsp; &nbsp;
                        <span><img src="{{ asset('images/content/view.svg') }}" alt=""> {{ $post->views }}</span>
                    </button>
                    @if ($post->status == 'Phốt')
                        <img src="{{ asset('images/content/phot.png') }}" alt="">
                    @else
                        <img src="{{ asset('images/content/scam.png') }}" alt="">
                    @endif
                </div>
            @endforeach
        </div>

        <div style="backdrop-filter: blur(10px);" class="text-center mt-5">
            <a class="btn btn-success" href="">Xem tất cả</a>
        </div>

    </div>
    {{-- end  content --}}

    {{-- start  banner --}}
    <img style="width: 100%" src="{{ asset('images/banner/banner.png') }}" alt="">
    {{-- end  banner --}}

    {{-- start  top comments --}}
    <div class="new-comments">
        <div class="new-comment">
            <p>Người Dùng MXH</p> <span>Bình Luận Mới Nhất</span>
        </div>
        @foreach ($comments as $comment)
            <div class="new-comment">
                <p> <img src="{{ $comment->avatar }}" alt="">{{ $comment->name }}</p>
                <span>{{ $comment->comment_content }}</span>
            </div>
            <hr
                style="
         border-top: 1px solid #ccc;
    color: #ff0000; 
    background-color: #ff0000;
        ">
        @endforeach
        <div style="backdrop-filter: blur(10px);" class="text-center mt-5">
            <a class="btn btn-success" href="">Xem tất cả</a>
        </div>

    </div>
    {{-- end top comments --}}

    {{-- start community  --}}

    <div class="body" id="nomargin">
        <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
        <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
        <img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}" alt="">
        <div class="hanhtinh arrow-up text-center">
            <img src="{{ asset('images/arrow.png') }}" alt=""> <br>
            <span class="text-light">Đầu trang</span>
        </div>
        <div class="hanhtinh logomess text-center">
            <img src="{{ asset('images/messageicon.png') }}" alt=""> <br>
            <span class="text-light">Hỗ trợ</span>
        </div>
        {{-- start  content --}}
        <h2 class="text-light" style="margin-left: 120px">Cộng Đồng Valorant</h2>
        <div class="contenter">
            @foreach ($posts as $post)
                <div class="content">
                    <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên :</span>
                        {{ $post->fullname }}</p>
                    <p><img src="{{ asset('images/content/password.svg') }}" alt=""><span>Username:</span>
                        {{ $post->username }}</p>
                    <button class="text-center">
                        Xem chi tiết &nbsp; &nbsp;
                        <span><img src="{{ asset('images/content/view.svg') }}" alt=""> {{ $post->views }}</span>
                    </button>
                    @if ($post->status == 'Phốt')
                        <img src="{{ asset('images/content/phot.png') }}" alt="">
                    @else
                        <img src="{{ asset('images/content/scam.png') }}" alt="">
                    @endif
                </div>
            @endforeach
        </div>

        <div style="backdrop-filter: blur(10px);" class="text-center mt-5">
            <a class="btn btn-success" href="">Xem tất cả</a>
        </div>

    </div>

    {{-- end community  --}}

@endsection
