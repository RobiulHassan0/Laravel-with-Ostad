<?php

namespace App\Http\Requests\Apartment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreApartmentRequest extends FormRequest
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
            "name"=> ['required', 'string','max:100'],
            'rent'=> ['nullable','numeric','min:1', 'max:99999'],
            'image'=> ['nullable','file','mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ];
    }

    public function messages(): array{
        return [
            'name.required'=> 'Name must be entered',
            'name.max'=> 'name maximum under 100 characters',
            'rent.numeric'=> 'Rent must be a number',
            'rent.min'=> 'rent must be minimum 1',
            'image.mimes'=> 'image must be under jpg, png, jpeg, gif, or webp',
            'image.max'=> 'image size can be max 2MB ',
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(
                response()->json([
                    'message' => 'Validation Failed',
                    'errors' => $validator->errors(),
                ], 422)
            );
    }
}
