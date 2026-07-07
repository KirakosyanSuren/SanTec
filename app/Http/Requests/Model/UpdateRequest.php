<?php

namespace App\Http\Requests\Model;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_models', 'name')
                    ->ignore($this->route('model'))
            ],

            'product_id' => ['required', 'exists:products,id'],

            'price' => ['required', 'numeric', 'min:0'],

            'characteristic_hy' => ['required', 'string'],
            'characteristic_ru' => ['required', 'string'],
            'characteristic_en' => ['required', 'string'],

            'main_image' => ['nullable', 'integer', 'min:1'],

            'image' => ['nullable', 'array'],
            'image.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ];
    }
}
