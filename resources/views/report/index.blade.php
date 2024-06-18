@extends('layouts.app');
@section('check', 'Tra cứu')
@section('title', 'Posts')
@section('sca', 'SCAM')
@php
    $menu = true;
    $tracuu = true;
@endphp

@section('content')
    <div class="body" id="body" style="">
        <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
        <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
        <div class="hanhtinh3_wrapper"><img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}"
                alt=""></div>

        <div class="hanhtinh arrow-up text-center">
            <img src="{{ asset('images/arrow.png') }}" alt=""> <br>
            <span class="text-light">Đầu trang</span>
        </div>
        <div class="hanhtinh logomess text-center">
            <img src="{{ asset('images/messageicon.png') }}" alt=""> <br>
            <span class="text-light">Hỗ trợ</span>
        </div>
        {{-- start  content --}}
        <div class="cangiua">

            <div class="contenter">
                @foreach ($posts as $post)
                    <a href="posts/{{ $post->id }}" class="none">

                        <div class="content">
                            <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên :</span>
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
        </div>

        @isset($posts[11])
            <div class="text-center mt-5">
                <button style="backdrop-filter: blur(10px);" id="load-more" class="btn btn-success">Xem thêm</button>
            </div>
        @endisset
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {
            var offset = 12;
            var search = `{{ request()->search ? request()->search : '' }}`
            $('#load-more').click(function() {
                console.log(screen.width);
                if ((window.innerWidth <= 1111 || screen.width <= 1111)) {
                    offset = 6;
                }
                $.ajax({
                    url: '/load-more',
                    method: 'GET',
                    data: {
                        search: search,
                        offset: offset,
                        screen: window.innerWidth ? window.innerWidth : screen.width
                    },
                    success: function(data) {
                        if (data.length > 0) {

                            var html = '';
                            if (window.innerWidth <= 1974) {
                                if (data.length == 7) {
                            var stt = 0;
                                    $.each(data, function(index, post) {
                                        stt++;
                                        if (stt <= 6) {
                                            html += `
                                <a href="posts/${post.id}" class="none">
                                <div class="content">
                                <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên :</span>
                                ${post.fullname}</p>
                                <p><img src="{{ asset('images/content/password.svg') }}" alt=""><span>Username:</span>
                                ${post.username}</p>
                                <button class="text-center">
                                Xem chi tiết &nbsp; &nbsp;
                                <span><img src="{{ asset('images/content/view.svg') }}" alt=""> ${post.views}</span>
                                </button>
                                `;
                                            if (post.status == 'Phốt') {
                                                html += `
                                <img src="{{ asset('images/content/phot.png') }}" alt="">
                                </div>
                                </a>
                                `
                                            } else {
                                                html += `
                                <img src="{{ asset('images/content/scam.png') }}" alt="">
                                </div>
                                </a>
                                `
                                            }
                                        }
                                    });
                                    $('.contenter').append(html);
                                    offset += 6;
                                } else {
                                    $.each(data, function(index, post) {
                                        html += `
                                    <a href="posts/${post.id}" class="none">
                                    <div class="content">
                                    <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên :</span>
                                    ${post.fullname}</p>
                                    <p><img src="{{ asset('images/content/password.svg') }}" alt=""><span>Username:</span>
                                    ${post.username}</p>
                                    <button class="text-center">
                                    Xem chi tiết &nbsp; &nbsp;
                                    <span><img src="{{ asset('images/content/view.svg') }}" alt=""> ${post.views}</span>
                                    </button>
                                    `;
                                        if (post.status == 'Phốt') {
                                            html += `
                                    <img src="{{ asset('images/content/phot.png') }}" alt="">
                                    </div>
                                    </a>
                                    `
                                        } else {
                                            html += `
                                    <img src="{{ asset('images/content/scam.png') }}" alt="">
                                    </div>
                                    </a>
                                    `
                                        }
                                    });
                                    $('.contenter').append(html);
                                    $('#load-more').text('Không còn bài report nào').prop(
                                        'disabled',
                                        true);
                                }

                            } else {
                                if (data.length == 13) {
                                    $.each(data, function(index, post) {
                                        stt++;
                                        if (stt <= 12) {
                                            html += `
                                <a href="posts/${post.id}" class="none">
                                <div class="content">
                                <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên :</span>
                                ${post.fullname}</p>
                                <p><img src="{{ asset('images/content/password.svg') }}" alt=""><span>Username:</span>
                                ${post.username}</p>
                                <button class="text-center">
                                Xem chi tiết &nbsp; &nbsp;
                                <span><img src="{{ asset('images/content/view.svg') }}" alt=""> ${post.views}</span>
                                </button>
                                `;
                                            if (post.status == 'Phốt') {
                                                html += `
                                <img src="{{ asset('images/content/phot.png') }}" alt="">
                                </div>
                                </a>
                                `
                                            } else {
                                                html += `
                                <img src="{{ asset('images/content/scam.png') }}" alt="">
                                </div>
                                </a>
                                `
                                            }
                                        }
                                    });
                                    $('.contenter').append(html);
                                } else {
                                    $.each(data, function(index, post) {
                                        html += `
                                    <a href="posts/${post.id}" class="none">
                                    <div class="content">
                                    <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên :</span>
                                    ${post.fullname}</p>
                                    <p><img src="{{ asset('images/content/password.svg') }}" alt=""><span>Username:</span>
                                    ${post.username}</p>
                                    <button class="text-center">
                                    Xem chi tiết &nbsp; &nbsp;
                                    <span><img src="{{ asset('images/content/view.svg') }}" alt=""> ${post.views}</span>
                                    </button>
                                    `;
                                        if (post.status == 'Phốt') {
                                            html += `
                                    <img src="{{ asset('images/content/phot.png') }}" alt="">
                                    </div>
                                    </a>
                                    `
                                        } else {
                                            html += `
                                    <img src="{{ asset('images/content/scam.png') }}" alt="">
                                    </div>
                                    </a>
                                    `
                                        }
                                    });
                                    $('.contenter').append(html);
                                    $('#load-more').text('Không còn bài report nào').prop(
                                        'disabled',
                                        true);
                                }
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
