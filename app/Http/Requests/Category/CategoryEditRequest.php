<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryEditRequest extends FormRequest
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
            'name' => 'required|unique:category|max:100,id'.request()->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống...',
            'name.unique' => 'Tên danh mục này đã tồn tại...',
            'name.max' => 'Tên danh mục không được quá 100 ký tự...',
        ];
    }
}
