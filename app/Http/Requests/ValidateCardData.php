<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCardData extends FormRequest
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
            'platform_id' => 'required',
            'name.*' => 'required',
            'value.*' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'seller_name' => 'required',
            'usage' => 'required',
            'description' => 'required',
            'image' => 'required',

        ];
    }
}
