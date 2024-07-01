<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'danhmuc' => 'required',
            'nganhang' => 'required',
            'status' => 'required',
            'noidung' => 'required',
            'image' => 'required',
            'hovaten' => 'required',
            'uid' => 'required',
            'sotaikhoan' => 'required',
            'sodienthoai' => 'required|regex:/^0[0-9]{9,12}$/',
            'post_phone' => 'required|regex:/^0[0-9]{9,12}$/'

        ];
    }

    public function messages()
    {
        return [
            'hovaten.required' => 'Họ và tên không được để trống',
            'noidung.required' => 'Nội dung không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'uid.required' => 'UID không được để trống',
            'username.required' => 'Vui lòng điền tên nhân vật của bạn',
            'sotaikhoan.required' => 'Vui lòng điền số tài khoản',
            'sodienthoai.required' => 'Vui lòng điền số điện thoại',
            'nganhang.required' => 'Ngân hàng không được để trống',
            'post_phone.required' => 'Số điện thoại người đăng không được để trống',
            'sodienthoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có từ 9-12 số',
            'post_phone.regex'=> 'Số điện thoại phải là thật'
        ];
    }
}
