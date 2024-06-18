@extends('layouts.app');
@section('title', 'Create')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
   <div class="cangiua">
    <div class="row">
        <div class="col-md-9 col-md-10">
            <h1>Thông tin scam</h1>
            <form action="/posts" method="POST">
                @csrf
                <div style="display: flex">

                    <div class="radio-container">
                        <input type="radio" id="option1" name="status" value="Scam"
                            @if (old('status') == 'Scam') checked @endif>
                        <label class="radio-custom" for="option1"></label>
                        <label class="radio-label" for="option1">Scam</label>
                    </div>
                    <div style="margin-left: 50px" class="radio-container">
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
                        <input class="form-input" name='username' type="text" id="email" placeholder=" "
                            value="{{ old('username') }}" required>
                        <label class="form-label" for="email">Username <span style="color: forestgreen">*</span></label>
                    </div>

                    <div  class="form-group input-mobile">
                        <input class="form-input" name='sotaikhoan' type="text" value="{{ old('sotaikhoan') }}"
                            id="email" placeholder=" " required>
                        <label class="form-label" for="email">Số tài khoản <span
                                style="color: forestgreen">*</span></label>
                        @error('sotaikhoan')
                            <div style="color: red">Vui lòng điền đúng định dạng</div>
                        @enderror
                    </div>

                </div>

                <div class="create-mobile">

                    <div class="form-group">
                        <input class="form-input" name='uid' type="text" id="email" placeholder=" "
                            value="{{ old('uid') }}" required>
                        <label class="form-label" for="email">UID <span style="color: forestgreen">*</span></label>
                    </div>

                    <div  class="form-group input-mobile">
                        <input class="form-input" name='link' type="text" id="email" placeholder=" "
                            value="{{ old('link') }}" required>
                        <label class="form-label" for="email">Link bài viết report <span
                                style="color: forestgreen">*</span></label>
                        @error('link')
                            <div style="color: red">Vui lòng điền đúng định dạng</div>
                        @enderror
                    </div>

                </div>

                <div class="create-mobile">

                    <div class="form-group">
                        <input class="form-input" name='hovaten' type="text" id="email" placeholder=" "
                            value="{{ old('hovaten') }}" required>
                        <label class="form-label" for="email">Họ và tên <span style="color: forestgreen">*</span></label>
                    </div>

                    <div  class="form-group input-mobile">
                        <input class="form-input" name='sodienthoai' type="text" id="email" placeholder=" "
                            value="{{ old('sodienthoai') }}" required>
                        <label class="form-label" for="email">Số điện thoại <span
                                style="color: forestgreen">*</span></label>
                        @error('sodienthoai')
                            <div style="color: red">Vui lòng điền đúng định dạng</div>
                        @enderror
                    </div>

                </div>

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
                        <select id="select" name="nganhang" class="form-select">
                            <option value="">Ngân hàng <span style="color: forestgreen">*</span></option>
                            <option value="MB">MB</option>
                            <option value="VCB">VCB</option>
                            <option value="BIDV">BIDV</option>
                        </select>
                        @error('nganhang')
                            <div style="color: red">Vui lòng chọn ngân hàng</div>
                        @enderror
                    </div>
                </div>

                <div style="color: var(--Light-White, #B5AB9A);">Upload Bill chuyển tiền & ảnh đoạn chat lừa đảo:</div>

                <div>
                    <textarea style="padding-left:12px; margin-top:24px ;" name="noidung" id="text" cols="121" rows="10"
                        placeholder="Nội dung report *">{{ old('username') }}</textarea>
                </div>
                @error('noidung')
                    <div style="color: red">{{ $message }}</div>
                @enderror

                <div style="display: flex">
                    <div id="img">
                    </div>
                    <div id="mar">
                        <input name='image' type="file" id="file" multiple accept="image/*" />
                        <label for="file" class="custom-file-upload"></label>
                    </div>

                </div>
                @error('image')
                    <div style="color: red">{{ $message }}</div>
                @enderror
                <h1 style="margin-top:  60px;">Người đăng</h1>
                <div class="create-mobile">
                    @foreach ($account as $row)
                        <div class="form-group">
                            <input class="form-input" type="text" id="name" value="{{ $row->name }}"
                                placeholder=" " required>
                            <label class="form-label" for="email">Họ và tên <span
                                    style="color: forestgreen">*</span></label>
                        </div>

                        <div  class="form-group input-mobile">
                            <input class="form-input" type="text" id="email" placeholder=" "
                                value="{{ $row->numberphone }}" required>
                            <label class="form-label" for="email">Số điện thoại <span
                                    style="color: forestgreen">*</span></label>
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
                    Đơn report sẽ bị gỡ nếu zalo ảo.</p>
                <button class="btn btn-success btn-send-create" type="submit">Gửi duyệt</button>
            </form>
        </div>

        <div class="col-md-1">
            <img class="img-ads" src="{{ asset('images/content/quangcao.png') }}" alt=""> <br>
            <img style="margin-top: 24px;" class="img-ads" src="{{ asset('images/content/quangcao2.png') }}"
                alt="">

        </div>
    </div>
   </div>
    <script src="{{ asset('js/img.js') }}"></script>
@endsection
