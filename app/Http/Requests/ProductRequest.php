<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => ['required', 'string'],
            "description" => ['required', 'string'],
            "author" => ['required', 'string'],
            "pages_num" => ['required', 'numeric'],
            "price" => ['required', 'numeric'],
            // "discount" => ['required', 'string','between:1,100'],
            "discount" => ['required', 'numeric','between:10,100'],
            "price_after_discount" => ['sometimes', 'numeric','between:10,100'],
            "quantity" => ['required', 'numeric'],
            "product_code" => ['required', 'numeric'],
            "available" => ['required','in:0,1'],
            "image" => ["mimes:png,jpg,jpeg,gif,webp"],
            'category_id' => ["required"],
        ];
    }
}
