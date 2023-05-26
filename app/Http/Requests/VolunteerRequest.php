<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;
class VolunteerRequest extends FormRequest
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
            'city' => ['required', 'max:20'],
            'email' => ['required', 'email','unique:users,email', 'max:50'],
            'phone' => ['required'],
            'attachment' => ['required'],
            'description' => ['required', 'max:255'],
            'volunteer_position_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'volunteer_position_id.required' => 'The volunteer position field is required.',
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
