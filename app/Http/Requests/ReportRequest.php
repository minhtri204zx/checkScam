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
            'link' => 'url',
            'sotaikhoan'=>'digits:10',
            'sodienthoai'=> 'regex:/^[0-9]{10}$/',
            'danhmuc'=>'required',
            'nganhang'=>'required',
            'status'=>'required',
            'noidung'=>'required',
            'image'=>'required'
        ];
    }

    public function messages()
    {
        return [

            'noidung.required' => 'Nội dung không được để trống',
            'image.required'=>'Ảnh không được để trống'
        ];
    }
}
