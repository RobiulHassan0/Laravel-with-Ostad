<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTenantRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required', 'string', 'max:100'],
            'phone' => ['required', 'unique:tenants,phone', 'string', 'max:11'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name must be entered',
            'name.max' => 'name maximum under 100 characters',
            'phone.required' => 'Phone field is missing from request', 
            'phone.unique' => 'This phone number is already registered',
            'phone.max' => 'name maximum under 11 characters',
            'image.mimes' => 'image must be under jpg, png, jpeg, gif, or webp',
            'image.max' => 'image size can be max 2MB ',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation Failed',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
