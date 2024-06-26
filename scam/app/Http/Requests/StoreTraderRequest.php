<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTraderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'fullname' => ['required'],
            'number_bank' => ['required', 'digits:10'],
            'bank' => ['required'],
            'describe' => ['required'],
            'zalo' => ['required', 'regex:/^[0-9]{10}$/'],
            'img' => ['required'],
            'category_id' => ['required'],
        ];
    }

    public function messages()
    {

        return [
            'fullname.required' => 'Tên không được để trống',
            'number_bank.required' => 'số tài khoản không được để trống',
            'bank.required' => 'tên ngân hàng không được để trống',
            'zalo.required' => 'số điện thoại không được để trống',
            'describe.required' => 'Mô tả không được để trống',
            'img.required' => 'Ảnh không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'number_bank.digits' => 'Vui lòng nhập đúng định dạng',
            'zalo.regex' => 'Vui lòng nhập đúng định dạng'

        ];
    }
}
