<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellingFeatureRequest extends FormRequest
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
            'feature_title' => ['required','string' ,'max:40'],
            'feature_description' => ['required','string' , 'max:200']
        ];
    }
}
