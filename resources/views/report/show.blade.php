@extends('layouts.menu2')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-9">
            <h1>Thông tin scam</h1>
                @csrf
                @foreach ($post as $row)
                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">Danh mục:</div>
                        <p>{{ $row->name }}</p>
                    </div>
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">

                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">User name:</div>
                        <p>{{ $row->username ? $row->username : 'NULL' }}</p>

                    </div>
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">
                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">UID:</div>
                        <p>{{ $row->uid }}</p>
                    </div>
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">
                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">Link bài viết:</div>
                        <p><a href="{{ $row->linkfb }}">Get link</a></p>
                    </div>
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">
                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">Họ tên:</div>
                        <p>{{ $row->name }}</p>
                    </div>
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">
                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">Số điện thoại:</div>
                        <p>{{ $row->numberphone ? $row->numberphone : 'NULL' }}</p>
                    </div>
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">
                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">Số tài khoản:</div>
                        <p>{{ $row->numberbank ? $row->numberbank : 'NULL' }}</p>
                    </div>
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">
                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">Ngân hàng:</div>
                        <p>{{ $row->namebank ? $row->namebank : 'NULL' }}</p>
                    </div>
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">
                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">Ảnh chụp băng chứng:</div>
                        <p>Còn đúng cái nịt</p>
                    </div>
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">
                    <div style="display: flex; margin-top: 50px;">
                        <div class="title">Nội dung report:</div>
                        <p>Bạn đầu có nhân viên giới thiệu việc làm trên FB, chỉ cần ấn theo dõi các trang chỉ định sẽ được
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
                    <hr
                        style="
                border: 0;
             height: 0.5px; /* Đặt chiều cao của thẻ hr */
             background-color: rgba(133, 133, 133, 0.288); /* Đặt màu nền */
             border-top: 0.5px solid rgba(255, 255, 255, 0.39); /* Đặt màu và độ dày của viền trên */
             margin: 20px 0; /* Khoảng cách trên và dưới thẻ hr */
                ">
                @endforeach
            <div style="display: flex">
                <p><span style="color: green">(1)</span>Bình luận</p>
                <p style="margin-left: 1050px">Hôm nay bạn còn <span style="color: green">3</span> lượt</p>
            </div>

            <div style="display: flex">
              <img style="width: 32px; height: 32px; border-radius: 100px" src="{{asset('images/banner/d5147a0852ef682f325c68ac7890c9ec.png')}}" alt="">  
                <form id="form" action="">
                   <textarea id="comment" name="comment" style="padding-left:12px; margin-top:24px ; padding-top: 12px" name="" id="" cols="121" rows="10" placeholder="Để lại bình luận của bạn về nội dung report này..."></textarea>
                   <button type="submit">Gửi</button>
                </form>
            </div>


        </div>

















        <div class="col-1">
            <img style="width: 282px" src="{{ asset('images/content/quangcao.png') }}" alt=""> <br>
            <img style="width: 282px; margin-top: 24px;" src="{{ asset('images/content/quangcao2.png') }}" alt="">

        </div>
        <script src="{{ asset('js/img.js') }}"></script>
    @endsection
