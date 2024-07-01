@extends('layouts.app')
@section('link')
<link rel="stylesheet" href="{{ asset('css/style3.css') }}">
@endsection
@php
    $menu = true;
@endphp

@section('content')
<div class="body" id="body">
    <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
    <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
    <div class="hanhtinh3_wrapper"><img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}" alt="">
    </div>

    <div class="cangiua pt-5">

        <h2 class="mb-3">
            <img src="{{asset('images/elip.png')}}" alt="">
            Giao dịch trung gian
        </h2>
        <div class="list-trader">

            @foreach ($traders as $trader)
                <div class="trader mb-3">
                    <img src="{{ asset('images/trader/'.$trader->img) }}" alt="">

                    <p>{{$trader->fullname}}</p>
                    <div class="trader-infor">
                        <div class="trader-contact">
                            <a href="https://www.facebook.com/MuaKeyCom"><img src="{{ asset('images/Messenger.svg') }}"
                                    alt=""></a>
                            <a href="tel:{{$trader->zalo}}"> <img src="{{ asset('images/phone.svg') }}" alt=""></a>
                        </div> {{-- end trader-contact --}}
                        <a href="/traders/{{$trader->id}}">Chi tiết</a>
                    </div> {{-- end trader-info --}}
                </div> {{-- end trader --}}
            @endforeach

        </div> {{-- end list-trader --}}

        <div class="more-trader text-center">
            <button id="loadMore" class="btn btn-success">Xem thêm</button>
        </div> {{-- end more-trader --}}

    </div> {{-- end cangiua --}}
</div> {{-- end body --}}

<script src="{{asset('js/trader.js')}}"></script>
<script>
    $(document).ready(function () {
        var offset = 6;
        $('#loadMore').click(function () {
            let stt = 0;
            $.ajax({
                url: '/load-more-traders',
                method: 'GET',
                data: {
                    offset: offset,
                },
                success: function (data) {
                    if (data.length > 0) {
                        var html = '';
                        $.each(data, function (index, trader) {
                            stt++
                            if (stt <= 6) {
                                html += `
                                  <div class="trader mt-3">
                <img src="http://localhost:8000/images/trader/${trader.img}" alt="">
                <p>${trader.fullname}</p>
                <div class="trader-infor">
                    <div class="trader-contact">
                        <img src="{{ asset('images/Messenger.svg') }}" alt="">
                        <img src="{{ asset('images/phone.svg') }}" alt="">
                    </div> {{-- end trader-contact --}}
                    <a href="traders/1">Chi tiết</a>
                </div> {{-- end trader-info --}}
                </div> {{-- end trader --}}
                                `
                            }
                        })
                        if (stt == 7) {
                            $('.list-trader').append(html)
                            offset = offset + 6
                        } else {

                            $('#loadMore').text('Đã hết').prop(
                                'disabled',
                                true);
                        }

                    }
                }
            })
        })

    })
</script>
@endsection