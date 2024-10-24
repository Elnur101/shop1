<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'description'=>'required|string|min:2',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0|max:99999999.99',
            'stock'=>'required',
            'cover'=>'required|image|mimes:png,jpeg,jpg,gif',
            'category_id'=>'required',
            'brand_id'=>'required',
            'image.*'=>'required|image|mimes:png,jpeg,jpg,gif',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Поле необходимо заполнить',
            'description.required'=>'Поле необходимо заполнить',
            'price.required'=>'Поле необходимо заполнить',
            'stock.required'=>'Поле необходимо заполнить',
            'cover.required'=>'Поле необходимо заполнить',
            'category_id.required'=>'Поле необходимо заполнить',
            'brand_id.required'=>'Поле необходимо заполнить',
            'image.required'=>'Поле необходимо заполнить',

        ];
    }
}
