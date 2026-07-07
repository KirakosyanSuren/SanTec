<?php

namespace App\Http\Requests\Brand;

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
                Rule::unique('brands')->ignore($this->brand),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('brands')->ignore($this->brand),
            ],

            'description_hy' => ['required', 'string'],
            'description_ru' => ['required', 'string'],
            'description_en' => ['required', 'string'],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            'certificates' => [
                'nullable',
                'array',
                function ($attribute, $value, $fail) {

                    if (!$value) {
                        return;
                    }

                    foreach ($value as $file) {

                        if (
                            strtolower(
                                $file->getClientOriginalExtension()
                            ) !== 'pdf'
                        ) {
                            $fail(__('admin.messages.pdf_only'));

                            return;
                        }
                    }
                },
            ],
        ];
    }
}
