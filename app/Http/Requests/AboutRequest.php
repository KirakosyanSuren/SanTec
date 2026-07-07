<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'title_hy' => ['required', 'string', 'max:255'],
            'title_ru' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],

            'description_hy' => ['required', 'string'],
            'description_ru' => ['required', 'string'],
            'description_en' => ['required', 'string'],
        ];
    }
}
