@extends('layouts.app')
@section('title', 'Create')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
   <div class="cangiua">
    <div class="row">
        <div class="col-md-9 col-md-10" style="width: 75.333333%;">
            <h3>Thông tin Scam</h3>
            <form action="/posts" method="POST" onsubmit="return checkImages()" enctype="multipart/form-data">
                @csrf
                <div style="display: flex">

                    <div class="radio-container">
                        <input type="radio" id="option1" name="status" value="Scam"
                            @if (old('status') == 'Scam') checked @endif>
                        <label class="radio-custom" for="option1"></label>
                        <label class="radio-label" for="option1">Scam</label>
                    </div>
                    <div style="margin-left: 31px" class="radio-container">
                        <input type="radio" id="option2" name="status" value="Phốt"
                            @if (old('status') == 'Phốt') checked @endif>
                        <label class="radio-custom" for="option2"></label>
                        <label class="radio-label" for="option2">Phốt</label>
                    </div>

                </div>
                @error('status')
                    <div style="color: red">Vui lòng chọn trạng thái</div>
                @enderror
                <div class="create-mobile">

                <div class="form-group">
                        <select name="danhmuc" class="form-select">
                            <option value="">Danh mục <span style="color: forestgreen">*</span></option>
                            @foreach ($cates as $cate)
                                <option @if (old('danhmuc') == $cate['id']) {{ 'selected' }} @endif
                                    value="{{ $cate['id'] }}">{{ $cate['name'] }}</option>
                            @endforeach
                        </select>
                        @error('danhmuc')
                            <div style="color: red">Vui lòng chọn danh mục</div>
                        @enderror
                    </div>

                    <div class="form-group input-mobile">
                        <input class="form-input" name='username' type="text" id="email" placeholder=" "
                            value="{{ old('username') }}">
                        <label class="form-label" for="email">Username <span style="color: forestgreen">*</span></label>
                        <div id="btnGetUID" onclick="getUID()" class="position-absolute" style="color:cornflowerblue; font-size:12px; left:10px;cursor: pointer;">Hướng dẫn cách lấy username</div>
                        <p></p>
                        <img src="https://www.phanmemninja.com/wp-content/uploads/2023/10/find-uid-facebook.png" id="getUID" alt="" style="width:800px; height:800px">
                        @error('username')
                            <div style="color: red">{{$message}}</div>
                    @enderror
                    </div>
                 
                </div>

                <div class="create-mobile">
                    <div class="form-group position-relative" >
                        <input class="form-input" name='uid' type="text" id="email" placeholder=" "
                            value="{{ old('uid') }}">
                        <label class="form-label " for="email">UID <span style="color: forestgreen">*</span></label>
                        <div id="btnGetUID" onclick="getUID()" class="position-absolute" style="color:cornflowerblue; font-size:12px; left:10px;cursor: pointer;">Hướng dẫn cách lấy UID</div>
                        <p></p>
                        <img src="https://www.phanmemninja.com/wp-content/uploads/2023/10/find-uid-facebook.png" id="getUID" alt="" style="width:800px; height:800px">
                        @error('uid')
                            <div style="color: red">{{$message}}</div>
                    @enderror
                    </div>  
                    <div class="form-group input-mobile">
                        <input class="form-input" name='link' type="text" id="email" placeholder=" "
                            value="{{ old('link') }}">
                        <label class="form-label" for="email">Link bài viết report</label>  
                    </div>
                </div>
                <div style="color: var(--Light-White, #B5AB9A);" class="mt-3">Thông tin người lừa đảo: </div>

                <div class="create-mobile">
                    <div class="form-group">
                        <input class="form-input" name='hovaten' type="text" id="email" placeholder=" "
                            value="{{ old('hovaten') }}">
                        <label class="form-label" for="email">Họ và tên <span style="color: forestgreen">*</span></label>
                        @error('hovaten')
                            <div style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                  

                    <div  class="form-group input-mobile">
                        <input class="form-input" name='sodienthoai' type="text" id="email" placeholder=" "
                            value="{{ old('sodienthoai') }}">
                        <label class="form-label" for="email">Số điện thoại <span
                                style="color: forestgreen">*</span></label>
                        @error('sodienthoai')
                            <div style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="create-mobile">
                <div  class="form-group">
                        <input class="form-input" name='sotaikhoan' type="text" value="{{ old('sotaikhoan') }}"
                            id="email" placeholder=" ">
                        <label class="form-label" for="email">Số tài khoản <span
                                style="color: forestgreen">*</span></label>
                        @error('sotaikhoan')
                            <div style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                
                    <div class="form-group input-mobile">
                    <input class="form-input" name='nganhang' type="text" value="{{ old('nganhang') }}"
                            id="email" placeholder=" ">
                        <label class="form-label" for="email">Ngân hàng <span
                                style="color: forestgreen">*</span></label>
                        @error('nganhang')
                            <div style="color: red">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div style="color: var(--Light-White, #B5AB9A);">Upload Bill chuyển tiền & ảnh đoạn chat lừa đảo:</div>

                <div>
                    <textarea style="padding-left:12px; margin-top:24px ;" name="noidung" id="text" cols="121" rows="10"
                        placeholder="Nội dung report *">{{ old('noidung') }}</textarea>
                </div>
                @error('noidung')
                    <div style="color: red">{{ $message }}</div>
                @enderror

                <div style="display: flex">
                    <div id="img">
                        <div id="mar">
                            <input name='image[]' onchange="debounceImages(event)" type="file" id="file" accept="image/*" multiple  />
                            <label for="file" class="custom-file-upload"></label>
                        </div>
                        @error('image')
                    <div style="color: red">{{ $message }}</div>
                      @enderror
                      @if (session('error'))
                    <div style="color: red">Ảnh không đúng định dạng</div>
                      @endif
                    </div>
                    
                </div>
                <div style="color:red" id="error">Ảnh không đúng định dạng</div>
               
                <h3 style="margin-top:  60px;">Người đăng</h3>
                <div class="create-mobile">
                    @foreach ($account as $row)
                        <div class="form-group">
                            <input class="form-input" type="text" id="name" name="post_name" disabled value="{{ $row->name }}"
                                placeholder=" ">
                            <label class="form-label" for="email">Họ và tên <span
                                    style="color: forestgreen">*</span></label>
                        </div>

                        <div  class="form-group input-mobile">
                            <input class="form-input" name="post_phone" type="text" id="email" placeholder=" "
                                value="{{ old('post_phone') }}">
                            <label class="form-label" for="email">Số điện thoại <span
                                    style="color: forestgreen">*</span></label>
                                    @error('post_phone')
                    <div style="color: red">{{ $message }}</div>
                @enderror
                        </div>
                    @endforeach
                </div>
                <p
                    style="
              color: var(--w-60, rgba(255, 255, 255, 0.60));
              font-family: Mulish;
              font-size: 12px;
              font-style: normal;
              font-weight: 400;
              line-height: normal;  ">
                    Đơn report sẽ bị gỡ nếu số điện thoại hoặc zalo là ảo.</p>
                    <p   style="
              color: var(--w-60, rgba(255, 255, 255, 0.60));
              font-family: Mulish;
              font-size: 12px;
              font-style: normal;
              font-weight: 400;
              line-height: normal;">Thông tin người dùng sẽ được bảo mật khi đăng bài</p>
    <div class="text-center">
    <button class="btn btn-success btn-send-create" id="guiduyet" type="submit">Gửi duyệt</button>
    </div>
</form>
        </div>

        <div class="col-md-1">
            <img class="img-ads" src="{{ asset('images/content/quangcao.png') }}" alt=""> <br>
            <img style="margin-top: 24px;" class="img-ads" src="{{ asset('images/content/quangcao2.png') }}"
                alt="">
        </div>
    </div>
   </div>
   <div class="image_overlay" id="over"></div>
    <div  class="notification" id="success">
   <img src="{{asset('images/success.png')}}" alt="">
    <div>
        <p>Gửi report thành công</p>
        <p>Chúng tôi sẽ kiểm tra và xét duyệt đơn của bạn</p>
        <button class="btn btn-success" id="closeNoti">Đóng</button>
    </div>
    </div>
        @if (session('success'))
        <script src="{{ asset('js/success.js') }}"></script>
        @endif
    <script src="{{ asset('js/img.js') }}"></script>
@endsection
