<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|unique:products|min:8|max:32',
            'category_id'=>'required',
            'images'=>'required',
            'quantity'=>'required|numeric',
            'price'=>'required|numeric',
            'description'=>'required',
        ];
    }
    public function messages()
    {
     return [
         'name.unique' => 'Tên này đã có',
         'name.required' => 'Chưa nhập tên sản phẩm',
         'name.min' => 'Tên phải có ít nhất 8 kí tự',
         'name.max' => 'Tên chỉ được tối đa 32 kí tự',
         'category_id.required'=>'Chưa chọn danh mục',
         'quantity.required'=>'Chưa nhập số lượng',
         "images.required" => "Chưa chọn ảnh sản phẩm",
         'price.required'=>'Chưa nhập giá',
         'description.required'=>'Chưa nhập mô tả',
         "quantity.numeric" => "Số lượng phải là số",
         "price.numeric" => "Giá phải là số",
     ];
    }
}
