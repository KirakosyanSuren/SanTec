<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'address_hy' => ['required', 'string', 'max:255'],
            'address_ru' => ['required', 'string', 'max:255'],
            'address_en' => ['required', 'string', 'max:255'],
        ];
    }
}
