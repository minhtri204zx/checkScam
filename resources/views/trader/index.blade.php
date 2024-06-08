@extends('layouts.app');
@php
    $menu=true
@endphp

@section('content')
    <div class="body" id="body" style="height: 1650px;">
        <img class="hanhtinh hanhtinh1" src="{{ asset('images/hanhtinh1.png') }}" alt="">
        <img class="hanhtinh hanhtinh2" src="{{ asset('images/hanhtinh2.png') }}" alt="">
        <div class="hanhtinh3_wrapper"><img class="hanhtinh hanhtinh3" src="{{ asset('images/hanhtinh3.png') }}" alt=""></div>



        <div class="cate">
            <h4 style="margin-left: 24px"><img src="https://s3-alpha-sig.figma.com/img/0f07/3905/64234613462786ec98f48309e032c955?Expires=1717977600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=m8Yc2kWBzaztH9OYtaI1kRZwmWJ3NZV9HBLcA~SkBzjquFoeUpFgHPxpoeL9CFK-zf4FofQetq6Q2fyyp7ksgyc-TN9MCjGlG1JCaWUafa43JMu0gluY0DBOWx1cCrX5wmbF4W0GgzP0XgrkjqKvT4rAKx2YCZg3wbGDFwdefVoMeD8re6e9zIuIDilJaX-SksPOQS7e7OBeMKCWqt1IarO3Va6DcooLJjLhZsPzOBHkH5GPTWAVeTp~ifM40DHWnBpWwLmzIZd73fS9UzjpjpH3Iheq2f0S9vTqDWQLTPtjtras3qSH4WpehOYyyGkRj7N7kfKHmau96lmRw-47pg__" alt="">&nbsp;&nbsp;Giao dịch trung gian</h4>
            <div class="list-trader">
@php
$stt = 0    
@endphp
                @foreach ($traders as $trader)
                @if ($trader->cate==1 && $stt<16 )
                <div>
                    <img src="{{$trader->img}}" alt="">
                    <p>{{$trader->name}}@if ($trader->active==1)<img style="width: 18px; height: 18px; margin-left: 5px;" src="{{asset('images/active.svg')}}" alt="">@endif</p>
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

            <h4 style="margin-left: 24px; margin-top: 36px;"><img src="https://s3-alpha-sig.figma.com/img/0f07/3905/64234613462786ec98f48309e032c955?Expires=1717977600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=m8Yc2kWBzaztH9OYtaI1kRZwmWJ3NZV9HBLcA~SkBzjquFoeUpFgHPxpoeL9CFK-zf4FofQetq6Q2fyyp7ksgyc-TN9MCjGlG1JCaWUafa43JMu0gluY0DBOWx1cCrX5wmbF4W0GgzP0XgrkjqKvT4rAKx2YCZg3wbGDFwdefVoMeD8re6e9zIuIDilJaX-SksPOQS7e7OBeMKCWqt1IarO3Va6DcooLJjLhZsPzOBHkH5GPTWAVeTp~ifM40DHWnBpWwLmzIZd73fS9UzjpjpH3Iheq2f0S9vTqDWQLTPtjtras3qSH4WpehOYyyGkRj7N7kfKHmau96lmRw-47pg__" alt="">&nbsp;&nbsp;Shop acx Lq, FF, PUPG, Roblox…</h4>
            <div class="list-trader">
                @php
                $stt = 0    
                @endphp
                           
                @foreach ($traders as $trader)
                @if ($trader->cate==2 && $stt<8 )
                <div>
                    <img src="{{$trader->img}}" alt="">
                    <p>{{$trader->name}}@if ($trader->active==1)<img style="width: 18px; height: 18px; margin-left: 5px;" src="{{asset('images/active.svg')}}" alt="">@endif</p>
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

            <h4 style="margin-left: 24px; margin-top: 36px;"><img src="https://s3-alpha-sig.figma.com/img/0f07/3905/64234613462786ec98f48309e032c955?Expires=1717977600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=m8Yc2kWBzaztH9OYtaI1kRZwmWJ3NZV9HBLcA~SkBzjquFoeUpFgHPxpoeL9CFK-zf4FofQetq6Q2fyyp7ksgyc-TN9MCjGlG1JCaWUafa43JMu0gluY0DBOWx1cCrX5wmbF4W0GgzP0XgrkjqKvT4rAKx2YCZg3wbGDFwdefVoMeD8re6e9zIuIDilJaX-SksPOQS7e7OBeMKCWqt1IarO3Va6DcooLJjLhZsPzOBHkH5GPTWAVeTp~ifM40DHWnBpWwLmzIZd73fS9UzjpjpH3Iheq2f0S9vTqDWQLTPtjtras3qSH4WpehOYyyGkRj7N7kfKHmau96lmRw-47pg__" alt="">&nbsp;&nbsp;Buff like, buff flow. fb- tiktok- IG</h4>
            <div class="list-trader">
                
                @php
                $stt = 0    
                @endphp
                           
                @foreach ($traders as $trader)
                @if ($trader->cate==2 && $stt<8 )
                <div>
                    <img src="{{$trader->img}}" alt="">
                    <p>{{$trader->name}}@if ($trader->active==1)<img style="width: 18px; height: 18px; margin-left: 5px;" src="{{asset('images/active.svg')}}" alt="">@endif</p>
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

