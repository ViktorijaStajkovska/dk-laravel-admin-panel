<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['max:20','required' ],
            'surname' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required'],
            'description' => ['required', 'max:255']
        ];
    }
}
