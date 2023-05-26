<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;

class ApplicationRequest extends FormRequest
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
            'city' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required', 'max:19'],
            'attachment1' => ['required'],
            'description' => ['required', 'max:255'],
            'application_type_id' => ['required'],
            'computer_equipment_id' => ['required'],
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field must not exceed 20 characters.',
            'surname.required' => 'The surname field is required.',
            'surname.max' => 'The surname field must not exceed 50 characters.',
            'city.required' => 'The city field is required.',
            'city.max' => 'The city field must not exceed 20 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email field must be a valid email address.',
            'email.max' => 'The email field must not exceed 50 characters.',
            'phone.required' => 'The phone field is required.',
            'attachment1.required' => 'The attachment1 field is required.',
            'description.required' => 'The description field is required.',
            'description.max' => 'The description field must not exceed 255 characters.',
            'application_type.required' => 'The application type field is required.',
            'computer_equipment.required' => 'The computer equipment field is required.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error'   => $validator->errors(),
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
