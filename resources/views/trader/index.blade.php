@extends('layouts.app')
@php
    $menu=true
@endphp

@section('content')
    <div class="body" id="body" >
        <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
        <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
        <div class="hanhtinh3_wrapper"><img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}" alt=""></div>

    <div class="cangiua">

        <div class="list-trader">
            <div class="trader">
                <img src="{{asset('images/trader/anh1.png')}}" alt="">
                <p>Nguyễn Trường Giang</p>
                <img src="" alt="">
                <img src="" alt="">
                <a href="">Chi tiết</a>
            </div>
        </div>

    </div>

    </div>
@endsection

