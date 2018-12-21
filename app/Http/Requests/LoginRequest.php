<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ];
    }
    public function messages()
    {
     return [
            'email.required'=>'Chưa nhập Email',
            'password.required'=>'Chưa nhập Pass',
            'password.min'=>'Không được dưới 3 kí tự',
            'password.max'=>'Không được quá 32 kí tự',
     ];
    }
}
