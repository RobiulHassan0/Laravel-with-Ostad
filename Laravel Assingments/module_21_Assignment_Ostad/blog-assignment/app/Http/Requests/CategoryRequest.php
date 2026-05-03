<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $categoryId = $this->route('id');

        return [           
            'name' => 'required|string|max:25|unique:categories,name,' . $categoryId,
            'description' => 'nullable|string|max:100', 
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Category name must be entered.',
            'name.unique' => 'Category name must be unique.',
            'description.max' => 'Description cannot exceed 100 characters.',
            'image.image' => 'Only Image file acceptable.'
        ];
    }
}
