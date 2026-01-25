<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MemberRequest extends FormRequest
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
            "name" => "required|string|max:20",
            "email" => "required|string|max:20",
            'role' => 'required|string|in:Admin,User,Editor',
            'status' => 'required|string|in:Active,Pending,Inactive',
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Name must be Entered",
            "name.string" => "Name must be a string",
            "name.max" => "Name cannot exceed 20 characters",
            "email.required" => "Email must be Entered",
            "email.string" => "Email must be a string",
            "email.max" => "Email cannot exceed 20 characters",
            "role.required"   => "Role must be selected",
            "role.in"         => "Role must be Admin, User, or Editor",
            "status.required" => "Status must be selected",
            "status.in"       => "Status must be Active, Pending, or Inactive",

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors()->first(),
            'errors' => $validator->errors(),
        ], 422));
    }
}
