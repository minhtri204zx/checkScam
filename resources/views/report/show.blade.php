@extends('layouts.app')
@section('title', 'Post')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
    <div class="cangiua">

        <div class="row">
            <div class="col-md-9 col-md-10" id="col-md-9">
                <h1>Thông tin scam</h1>
                @csrf
                <div class="fields">
                    <div class="title">Danh mục:</div>
                    <p class="noidung">{{ $post->category->name }}</p>
                </div>
                <hr class="hr">

                <div class="fields">
                    <div class="title">User name:</div>
                    <p class="noidung">{{ $post->username ? $post->username : 'NULL' }}</p>

                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">UID:</div>
                    <p class="noidung">{{ $post->UID }}</p>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Link bài viết:</div>
                    <p class="noidung"><a href="{{ $post->linkfb }}">Get link</a></p>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Họ tên:</div>
                    <p class="noidung">{{ $post->fullname }}</p>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Số điện thoại:</div>
                    <p class="noidung">{{ $post->numberphone ? $post->numberphone : 'NULL' }}</p>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Số tài khoản:</div>
                    <p class="noidung">{{ $post->numberbank ? $post->numberbank : 'NULL' }}</p>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Ngân hàng:</div>
                    <p class="noidung">{{ $post->namebank ? $post->namebank : 'NULL' }}</p>
                </div>
                <hr class="hr">
                <div class="fields">

                    <div class="title">Ảnh chụp băng chứng:</div>
                    <div class="images">
                    @php
                    $images = json_decode($post->images)
                    @endphp
                    @if (is_array($images))
                    @foreach ($images as $image)
                     <div class="image-container">
                        <img src="{{asset('images/'.$image)}}" style="margin-top: 0px" alt="Image" class="image">
                    </div>
                    @endforeach
                    @else
                    <p class="noidung">Không có ảnh</p>
                    @endif
                </div>
                </div>
                <hr class="hr">
                <div class="fields">
                    <div class="title">Nội dung report:</div>
                    <p class="noidung">Bạn đầu có nhân viên giới thiệu việc làm trên FB, chỉ cần ấn theo dõi các trang chỉ định sẽ được
                        tính 8.000 1 bài thích. Xong 5 bài sẽ được chuyển 40.000 vào TK.Sau đó đối tượng sẽ giao nhiệm
                        vụ tiếp bước. Gửi các nhiệm vụ có mức tiền cược khác nhau có tỉ lệ hoa hồng từ 30 – 50%. Đối
                        tượng yêu cầu chuyển tiền trước sau khi xác nhận sẽ gửi bản cam kết từ Công ty TNHH Thương mại
                        Dịch vụ Truyền thông LUNA, và hướng dẫn thực hiện nhiệm vụ theo yêu cầu của đối tác. Nhấp vào
                        đường link https://m.vnsc-finhay.com/ để thực hiện nhiệm vụ. Hoàn thành sẽ nhận được tiền gốc +
                        hoa hồng. Từ 20h – 20h30 sẽ trả lương riêng 300.000. Về sau nhiệm vụ sẽ nhiều tiền hơn và hoa
                        hồng cao hơn để lôi kéo nạn nhân chuyển tiền. Sau đó tìm cách báo lỗi là thực hiện sai để nạn
                        nhân thực hiện tiếp nhiệm vụ khác thì mới rút được tiền gốc + lãi ra. Nạn nhân sợ mất số tiền đó
                        nên làm theo yêu cầu và bị đối tượng dẫn dụ liên tục để nạn nhân chuyển tiền.Đối tượng sử dụng
                        tên công ty có mã số thuế đàng quàng và tài khoản công ty rõ ràng nên nạn nhân dễ bị lừa, tin
                        tưởng công ty. Đối tượng gửi các bản cam kết rất chân thực có đóng dấu và chữ kí của giám đốc và
                        trưởng phòng hẳn hoi.</p>
                </div>
                <hr class="hr">
                <div style="display: flex; justify-content: space-between">
                    @php
                        $comments = $post->comments;
                    @endphp
                    @foreach ($comments as $comment)
                        <p><span style="color: green">({{ $comment->count(request()->id) }})</span>Bình luận</p>
                    @break
                @endforeach
                <p class="num-comments">Hôm nay bạn còn <span
                        style="color: green">{{ $account['numcomments'] }}</span>
                    lượt</p>
            </div>

            <div style="display: flex">
                <img style="width: 32px; height: 32px; border-radius: 100px" src="{{ $post->account->avatar }}"
                    alt="">
                <form id="form" action="/comment" method="POsT"
                    @if (!Auth::check()) onsubmit="return false" @endif>
                    @csrf
                    <input type="hidden" value="{{ $account['numcomments'] }}" name="numcomments">
                    <input type="hidden" value="{{ request()->id }}" name="post">
                    <textarea style="margin-top: -50px; margin-left: 20px; padding: 10px 0 0 10px" id="comment" name="comment"
                        style="" name="comment" id="" rows="10"
                        placeholder="Để lại bình luận của bạn về nội dung report này..."></textarea>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                        style="margin-top: -77px; margin-left: 20px;" type="submit">Gửi</button>
                </form>

            </div>
            @error('comment')
                <div style="color: red">{{ $message }}</div>
            @enderror
            {{-- start list comments --}}
            @foreach ($comments as $comment)
                <nav class="navbar navbar-dark">
                    <div class="container-fluid">
                        <div style="display: flex">
                            <img style="width: 32px; height: 32px; border-radius: 100px"
                                src="{{ $comment->account->avatar }}" alt="">
                            <div>

                                <p style="margin-left: 15px; color: var(--Blue, #0989FF);">{{ $comment->account->name }}
                                </p>
                                <p style="margin-left: 15px; margin-top: -12px;">{{ $comment->comment_content }}</p>
                                <div style="display: flex; margin-left: 15px; margin-top: -12px;">

                                    @if ($comment->check == 1)
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            id="like{{ $comment->id }}" onclick="unlike({{ $comment->id }})"
                                            style="display: flex; text-decoration: none">
                                            <img style="margin-bottom: 20px" src="{{ asset('images/content/dalike.svg') }}"
                                                alt="">
                                            <p>&nbsp;<span id="num{{ $comment->id }}">{{ $comment->like }}</span> Thích
                                                &nbsp;&nbsp;</p>
                                        </a>
                                    @else
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            id="like{{ $comment->id }}" onclick="like({{ $comment->id }})"
                                            style="display: flex; text-decoration: none">
                                            <img style="margin-bottom: 20px"
                                                src="{{ asset('images/content/chualike.svg') }}" alt="">
                                            <p>&nbsp;<span id="num{{ $comment->id }}">{{ $comment->like }}</span> Thích
                                                &nbsp;&nbsp;</p>
                                        </a>
                                    @endif

                                    <a style="display: flex; text-decoration: none" data-bs-toggle="collapse"
                                        data-bs-target="#navbarToggleExternalContent{{ $loop->index }}"
                                        aria-controls="navbarToggleExternalContent{{ $loop->index }}"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <img style="margin-bottom: 20px" src="{{ asset('images/content/traloi.svg') }}"
                                            alt="">
                                        <p>&nbsp;{{ $comment->number }} Trả lời</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div style="margin-left: 30px;" class="collapse" id="navbarToggleExternalContent{{ $loop->index }}"
                    data-bs-theme="dark">
                    <div class=" p-4">
                        @foreach ($comment->replies as $reply)
                            <div style="display: flex;">
                                <img style="width: 32px; height: 32px; border-radius: 100px"
                                    src="{{ $reply->account->avatar }}" alt="">
                                <div>
                                    <p style="margin-left: 15px; color: var(--Blue, #0989FF);">{{ $reply->account->name }}
                                    </p>
                                    <p style="margin-left: 15px; margin-top: -12px;">{{ $reply->comment_content }}</p>
                                    <div style="display: flex; margin-top: -12px; margin-left: 15px;">

                                        @if ($reply->check == 1)
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                id="like{{ $reply->id }}" onclick="unlike({{ $reply->id }})"
                                                style="display: flex; text-decoration: none">
                                                <img style="margin-bottom: 20px"
                                                    src="{{ asset('images/content/dalike.svg') }}" alt="">
                                                <p>&nbsp;<span id="num{{ $reply->id }}">{{ $reply->like }}</span>
                                                    Thích &nbsp;&nbsp;</p>
                                            </a>
                                        @else
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                id="like{{ $reply->id }}" onclick="like({{ $reply->id }})"
                                                style="display: flex; text-decoration: none">
                                                <img style="margin-bottom: 20px"
                                                    src="{{ asset('images/content/chualike.svg') }}" alt="">
                                                <p>&nbsp;<span id="num{{ $reply->id }}">{{ $reply->like }}</span>
                                                    Thích &nbsp;&nbsp;</p>
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div style="display: flex">
                            <form id="form" @if (!Auth::check()) onsubmit="return false" @endif
                                action="/comment" method="post">
                                @csrf
                                <input type="hidden" value="{{ $account['numcomments'] }}" name="numcomments">
                                <input type="hidden" value="{{ $comment->id }}" name="reply">
                                <input type="hidden" value="{{ $post->id }}" name="post">
                                <textarea style="margin-top: -50px; margin-left: 20px; padding: 10px 0 0 10px" id="comment" name="comment"
                                    style="padding-left:12px; margin-top:24px ; padding-top: 12px" name="" id="" cols="121"
                                    rows="10" placeholder="Nhập câu trả lời của bạn ..."></textarea>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    style="margin-top: -77px; margin-left: 20px;" type="submit">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- end list comments --}}

        </div>

    <div class="col-md-1">
        <img class="img-ads" src="{{ asset('images/content/quangcao.png') }}" alt=""> <br>
        <img style="margin-top: 24px;" class="img-ads" src="{{ asset('images/content/quangcao2.png') }}"
            alt="">

    </div>
    </div>
    <script src="{{ asset('js/img.js') }}"></script>
    <script>
        // Lưu vị trí cuộn trước khi tải lại trang
        window.addEventListener('beforeunload', function() {
            localStorage.setItem('scrollPosition', window.scrollY);
        });
        // Lấy vị trí cuộn sau khi tải lại trang và cuộn trang đến vị trí đó
        window.addEventListener('load', function() {
            var scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, parseInt(scrollPosition, 10));
                localStorage.removeItem('scrollPosition')
            }
        });
        window.addEventListener('resize', ()=>{
            if (screen.width<=1650 && screen.width>= 1519) {
        console.log(document.getElementById('col-md-9'));
            document.getElementById('col-md-9').style.marginLeft = '-7.3px'
        }
        })
        if (screen.width<=1650 && screen.width>= 1519) {
        console.log(document.getElementById('col-md-9'));
            document.getElementById('col-md-9').style.marginLeft = '-7.3px'
        }
    </script>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@auth
    <script>
        function like(id) {

            $.ajax({
                url: '/like/' + id,
                method: 'GET',
                success: function(response) {
                    if (response == 'like') {
                        let num = document.getElementById('num' + id);
                        let a = document.getElementById('like' + id);
                        num = +num.innerText;
                        a.onclick = function() {
                            a.onclick = unlike(id);
                        }
                        a.innerHTML =
                            ` <img style="margin-bottom: 20px"src="{{ asset('images/content/dalike.svg') }}" alt=""><p>&nbsp;<span id="num${id}">${num+1}</span>  Thích &nbsp;&nbsp;</p>`
                    }
                },
            });

        }

        function unlike(id) {
            $.ajax({
                url: '/unlike/' + id,
                method: 'GET',
                success: function(response) {
                    let num = document.getElementById('num' + id);
                    let a = document.getElementById('like' + id);
                    num = +num.innerText;
                    a.onclick = function() {
                        a.onclick = like(id);
                    }

                    a.innerHTML =
                        `<img style="margin-bottom: 20px"src="{{ asset('images/content/chualike.svg') }}" alt=""><p>&nbsp;<span id="num${id}">${num-1}</span>  Thích &nbsp;&nbsp;</p>`
                },
            });

        }
    </script>
@else
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')
        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>

@endauth


