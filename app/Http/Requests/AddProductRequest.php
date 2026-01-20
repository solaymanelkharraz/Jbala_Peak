<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'nom' => 'required|min:5',
            'prix' => 'required|numeric',
            'categorie' => 'required|min:3',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048' // Max 2MB
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'The product name is required.',
            'nom.min' => 'The name is too short (min 5 chars).',
            'prix.required' => 'The price is required.',
            'categorie.required' => 'The category is required.',
            'image.required' => 'Please upload an image.',
            'image.image' => 'The file must be an image (jpg, png).',
            'image.max' => 'The image is too big (max 2MB).'
        ];
    }
}