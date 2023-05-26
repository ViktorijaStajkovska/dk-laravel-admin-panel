<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
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
            'application_id' => ['required' ],
            'donation_name' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'application_id.required' => 'The application field is required.',
            'donation_name.required' => 'The donation field is required.',
        ];
    }
}
