<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'fullname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Số ký tự không vượt quá 255',
            'email.unique' => 'Email không được trùng',
            'fullname.required' => 'Họ và tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',  
            'dob.required' => 'Ngày sinh không được để trống',  
            'dob.date' => 'Ngày sinh không đúng định dạng',     

        ];
    }
}
