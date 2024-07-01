@extends('layouts.app')
@php
    $menu = true;
@endphp
@section('content')
<div class="hanhtinh arrow-up text-center" id="scrollUp">
                <img src="{{ asset('images/arrow.png') }}" alt=""> <br>
                <span class="text-light">Đầu trang</span>
            </div>
            <div class="hanhtinh logomess text-center" style="">
                <img src="{{ asset('images/messageicon.png') }}" alt=""> <br>
                <span class="text-light">Hỗ trợ</span>
            </div>
<div class="body">
    <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
    <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
    <div class="hanhtinh3_wrapper"><img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}" alt="">
    </div>
    <div class="cangiua">
        <div class="body-con">
            {{-- start content --}}

            <div class="contenter" id="contenter">
                @php
                    $stt=0
                @endphp
                @foreach ($posts as $post)
                @php
                    $stt++
                @endphp
                    <a href="posts/{{ $post->id }}" class="none">
                        <div class="content">
                            <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên
                                    :</span>
                                {{ $post->fullname }}</p>
                            <p><img src="{{ asset('images/content/password.svg') }}" alt=""><span>Username:</span>
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

                @if ($stt>=12)
                <div class="text-center mt-5">
                            <a style="backdrop-filter: blur(10px);" class="btn btn-success" href="/posts">Xem tất cả</a>
                        </div>
                @endif
                        

        </div>
    </div>
</div>
{{-- end content --}}

{{-- start banner --}}
<div class="banner-content">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($banners as $banner)

            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" @if ($loop->index == 0) class="active" @endif aria-current="true"
                aria-label="Slide {{$loop->iteration}}}"></button>
            @endforeach

        </div>
        <div class="carousel-inner">
           @foreach ($banners as $banner)
           <div class="carousel-item  @if ($loop->index == 0) active @endif">
                <img src="{{asset('images/banner/banner.png')}}" class="d-block w-100" alt="...">
            </div>
           @endforeach
        </div>
        <button id="pre" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button id="next" class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
{{-- end banner --}}

{{-- start top comments --}}
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

{{-- start community --}}

<div class="body" id="nomargin">
    {{-- start content --}}
    <div class="cangiua">
        <div class="body-con">
            <h5 class="text-light">Cộng Đồng Valorant</h5>
            <div class="contenter">
                @foreach ($communities as $community)
                    <a class="none" href="">
                        <div class="content">
                            <p><img src="{{ asset('images/communities/' . $community->image) }}"
                                    alt=""><span>{{$community->name}}</span></p>
                            <p>{{$community->infor}}</p>
                            <p class="link" style="color: var(--Blue, #0989ff);" href="">
                                {{$community->link}}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</div>
{{-- end community --}}

{{-- start outstanding --}}

<div class="noibat">
    <div class="cangiua">
        <div class="overlay-noibat">
            <h1 class="text-center">Tính năng nổi bật</h1>
            <p>Các tin tức nổi bật về tình trạng scam hiện nay. Hãy đọc tin tức để phòng hờ các kẻ xấu lợi dụng scam</p>
            <div class="check">
                <div class="check-left">
                    <img src="{{ asset('images/content/nutv.svg') }}" alt="">
                    <h4>Check scammer</h4>
                    <p>Bạn chỉ cần nhập SDT, STK ngân hàng, thông tin của scammer vào trong ô tìm kiếm sẽ được phơi bày
                    </p>
                    <a href="" class="btn btn-success">Report lừa đảo</a>
                </div>

                <div class="check-left">
                    <img src="{{ asset('images/content/nutv.svg') }}" alt="">
                    <h4>Quỹ bảo hiểm</h4>
                    <p>Bạn muốn report một ai đó đang lừa đảo bạn ,đã đủ chứng cứ để kẻ lừa đảo phải chịu hình phạt</p>
                    <a href="" class="btn btn-success">Quỹ bảo hiểm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>

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

        document.getElementById('scrollUp').onclick = function() {
        window.scroll({top: 0, behavior: 'smooth'});
        }
</script>
@endsection