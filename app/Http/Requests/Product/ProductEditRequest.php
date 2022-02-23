<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name' => 'required|unique:product|max:100',
            'upload'=> 'required',
            'price'=> 'required',
            'status' => 'required',
            'category_id'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống...',
            'name.unique' => 'Tên sản phẩm này đã tồn tại...',
            'name.max' => 'Tên sản phẩm không được quá 100 ký tự...',
            'price.required' => 'giá sản phẩm không được để trống',
            'status.required' => 'Mời bạn chọn trạng thái sản phẩm...',
            'upload.required' => 'Mời bạn chọn ảnh sản phẩm',
            'category_id.required' => 'Mời bạn chọn danh mục sản phẩm'
        ];
    }
}
