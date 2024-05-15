@extends('layouts.menu2')
@section('link')
<link rel="stylesheet" href="{{asset('css/style2.css')}}">
@endsection
@section('content')

<div class="row">
  <div class="col-8">
    <h1>Thông tin scam</h1>
   <form action="">
   <div style="display: flex">

    <div class="radio-container">
        <input type="radio" id="option1" name="options" value="1">
        <label class="radio-custom" for="option1"></label>
        <label class="radio-label" for="option1">Scam</label>
    </div>
    <div style="margin-left: 50px" class="radio-container">
        <input type="radio" id="option2" name="options" value="2">
        <label class="radio-custom" for="option2"></label>
        <label class="radio-label" for="option2">Phốt</label>
    </div>

   </div>
    
   <div style="display: flex">

    <div class="form-group">
        <input class="form-input" type="email" id="email" placeholder=" " required>
        <label class="form-label" for="email">Email <span style="color: forestgreen">*</span></label>
    </div>

    <div style="margin-left: 24px;" class="form-group">
        <input class="form-input" type="email" id="email" placeholder=" " required>
        <label class="form-label" for="email">Email <span style="color: forestgreen">*</span></label>
    </div>

   </div>

   <div style="display: flex">

    <div class="form-group">
        <input class="form-input" type="email" id="email" placeholder=" " required>
        <label class="form-label" for="email">UID <span style="color: forestgreen">*</span></label>
    </div>

    <div style="margin-left: 24px;" class="form-group">
        <input class="form-input" type="email" id="email" placeholder=" " required>
        <label class="form-label" for="email">Link bài viết report <span style="color: forestgreen">*</span></label>
    </div>

   </div>

   <div style="display: flex">

    <div class="form-group">
        <input class="form-input" type="email" id="email" placeholder=" " required>
        <label class="form-label" for="email">Họ và tên <span style="color: forestgreen">*</span></label>
    </div>

    <div style="margin-left: 24px;" class="form-group">
        <input class="form-input" type="email" id="email" placeholder=" " required>
        <label class="form-label" for="email">Số điện thoại <span style="color: forestgreen">*</span></label>
    </div>

   </div>

   <div style="display: flex">

    <div class="form-group">
        <select name=""class="form-select">
                <option value="">Danh mục <span style="color: forestgreen">*</span></option>  
                <option value="">Danh mục <span style="color: forestgreen">*</span></option>  
                <option value="">Danh mục <span style="color: forestgreen">*</span></option>  
                <option value="">Danh mục <span style="color: forestgreen">*</span></option>  

        </select>
    </div>

    <div style="margin-left: 24px;" class="form-group">
        <input class="form-input" type="email" id="email" placeholder=" " required>
        <label class="form-label" for="email">Email <span style="color: forestgreen">*</span></label>
    </div>

   </div>


    


   </form>
  </div>

  <div class="col-4">
  </div>

</div>

@endsection
