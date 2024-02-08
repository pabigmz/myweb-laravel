<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateproductsRequest extends FormRequest
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
            'name' => 'required|string|max:250',
            'cost' => 'required|max:1000',
            'price' => 'required|max:1000',
            'quantity' => 'required|max:1000',
            'image' => 'required|file|max:250',
            'product_types_id'=> 'required|max:100'
        ];
    }
}
