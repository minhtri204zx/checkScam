@extends('layouts.app')
@php
    $menu=true
@endphp

@section('content')
<style>
    .background-1::before{
        height: 100%;
    }
</style>
    <div class="body" id="body" >
        <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
        <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
        <div class="hanhtinh3_wrapper"><img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}" alt=""></div>

      <div class="cangiua">
        <div class="cate">
            <h4 style="margin-left: 24px"><img src="{{asset('images/elip.png')}}" alt="">&nbsp;&nbsp;Giao dịch trung gian</h4>
            <div class="list-trader">
                @php
                $stt = 0
                @endphp
                    @foreach ($traders as $trader)
                @if ($trader->cate==1 && $stt<18 )
                <div>
                    <img src="{{asset('images/trader/'.$trader->img)}}" alt="">
                    <p>{{$trader->fullname}}@if ($trader->active==1)<img style="width: 18px; height: 18px; margin-left: 5px;" src="{{asset('images/active.svg')}}" alt="">@endif</p>
                    <div>
                        <img src="{{asset('images/Messenger.svg')}}" alt="">
                        <img src="{{asset('images/call.svg')}}" alt="">
                            <a href="/insurance/{{$trader->id}}" class="btn btn-secondary">Chi tiết</a>
                    </div>
                </div>
                @php
                    $stt++
                @endphp
                @endif
                @endforeach
            </div>
      </div>

        </div>
@endsection

