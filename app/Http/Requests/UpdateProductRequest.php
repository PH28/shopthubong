<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;
class UpdateProductRequest extends FormRequest
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
         $product = Product::where('id', '=', request()->id)->first();
        return [
            //
            'name'=>'required|min:8|max:32|unique:products,name,' . $product->id . ',id',
            'category_id'=>'required',
            'quantity'=>'required|integer|min:1',
            'price'=>'required|integer|min:1',
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
         'price.required'=>'Chưa nhập giá',
         'description.required'=>'Chưa nhập mô tả',
         "quantity.integer" => "Số lượng phải là số",
         "price.integer" => "Giá phải là số",
         "quantity.min" => "Số lượng không được nhỏ hơn 1",
         "quantity.regex" => "Số lượng không được âm",
         "price.min" => "Giá không được nhỏ hơn 1 ",
         

     ];
    }
}
