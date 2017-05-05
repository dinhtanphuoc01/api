<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|unique:products|max:30',
            'detail'      => 'required|max:255',
            'image'       => 'required|max:255',
            'price'       => 'required|integer|min:0',
            'category_id' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Bắt buộc có trường Name',
            'name.unique'          => 'Name đã tồn tại',
            'name.max'             => 'Tối đa 30 kí tự',
            'detail.required'      => 'Bắt buộc có trường Detail',
            'detail.max'           => 'Tối đa 255 kí tự',
            'image.required'       => 'Bắt buộc có trường Image',
            'image.max'            => 'Tối đa 255 kí tự',
            'price.required'       => 'Bắt buộc có trường Price',
            'price.integer'        => 'Bắt buộc trường Price là số',
            'price.min'            => 'Tối thiểu Price là 0',
            'category_id.required' => 'Bắt buộc có trường Category_id',
            'category_id.integer'  => 'Bắt buộc trường Category_id là số',
            'category_id.min'      => 'Tối thiểu Category_id là 0',
        ];
    }

    public function response(array $errors)
    {
        return Response::json($errors, 400);
    }
}
