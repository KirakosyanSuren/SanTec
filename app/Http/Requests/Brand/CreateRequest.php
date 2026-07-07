<?php

namespace App\Http\Requests\Brand;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
                Rule::unique('brands'),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('brands'),
            ],

            'description_hy' => ['required', 'string'],
            'description_ru' => ['required', 'string'],
            'description_en' => ['required', 'string'],

            'logo' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            'certificates' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {

                    foreach ($value as $file) {

                        if ($file->getClientOriginalExtension() !== 'pdf') {
                            $fail(__('admin.messages.pdf_only'));
                            return;
                        }
                    }
                },
            ],
        ];
    }
}
