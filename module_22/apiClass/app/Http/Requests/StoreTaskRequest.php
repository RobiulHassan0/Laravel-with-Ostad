<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required','string','max:100'],
            'description' => ['nullable','string','max:500', 'min:10'],
            'image' => ['nullable','file','mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
            
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'=> 'Title is required',
            'title.max' => 'Title must not exceed 100 characters',
            'description.max'=> 'Description can not exceed 500 letters',
            'description.min'=> 'Description must be at least 10 letters',
            'image.mimes'=> 'Image file type must be jpg,jpeg,png,gif,webp'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors()->first(),
            'errors'=> $validator->errors(),
        ], 422));
    }

}
