<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'title' => ['max:20','required' ],
            'image' => ['required'],
            'text' => ['required'],
            'category_id' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'The category field is required.'
        ];
    }
}
