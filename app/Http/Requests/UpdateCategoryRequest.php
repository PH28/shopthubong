<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;
use Illuminate\Validation\Rule;
class UpdateCategoryRequest extends FormRequest
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
         $category = Category::where('id', '=', request()->id)->first();
        return [
            //
            'name'=>'required|min:8|max:32|unique:categories,name,' . $category->id . ',id',
            'description'=>'required',
        ];
    }
    public function messages()
    {
     return [
         'name.unique' => 'Tên này đã có',
         'name.required' => 'Chưa nhập tên danh sách',
         'name.min' => 'Tên phải có ít nhất 8 kí tự',
         'name.max' => 'Tên chỉ được tối đa 32 kí tự',
         'description.required' => 'Chưa nhập desciption',
     ];
    }
}
