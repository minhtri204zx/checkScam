@extends('layouts.app');
@section('content')
<div class="body">
    <div class="contenter">
        <div class="content">
            <p><img src="{{asset('images/content/Profile.svg')}}" alt=""><span>Họ và tên  :</span>  tri123123</p>
            <p><img src="{{asset('images/content/password.svg')}}" alt=""><span>Username:</span> tri123123</p>
            <button class="text-center">
            Xem chi tiết &nbsp; &nbsp;
             <span><img src="{{asset('images/content/view.svg')}}" alt=""> 123123</span>
            </button>
            <img src="{{asset('images/content/scam.png')}}" alt="">
        </div>      
        
    </div>
</div>
@endsection

