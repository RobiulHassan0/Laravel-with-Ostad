<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:150',
            'short_desc' => 'required|string|max:150',
            'content' => 'required|string|max:2000|min:50',
            'category_id' => 'required|exists:categories,id',
            // 'user_id' => 'required|exists:users,id',
            'status' => 'required|in:draft,published',
            // 'published_at' => 'nullable|date',
            // 'read_time' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'short_desc.required' => 'The short description field is required.',
            'content.required' => 'The content field is required.',
            'content.min' => 'The content must be at least 50 characters.',
            'category_id.required' => 'The category field is required.',
            'category_id.required' => 'The category field is required.',
            // 'user_id.required' => 'The user field is required.',
            'status.required' => 'The status field is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, webp.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    }
}
