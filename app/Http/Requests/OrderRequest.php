<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'email_order' => 'required|email|max:255|',
            'phone_order' => 'required',
            'address_order' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email_order.required' => 'Email không được để trống',
            'email_order.email' => 'Email không đúng định dạng',
            'email_order.max' => 'Số ký tự không vượt quá 255',
            'phone_order.required' => 'Số điện thoại không được để trống',
            'address_order.required' => 'Địa chỉ không được để trống',    

        ];
    }
}