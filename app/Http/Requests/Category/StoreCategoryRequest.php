<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    public function messages():array 
    {
        return [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.unique' => 'Já existe uma categoria com este nome.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser: JPEG, PNG, JPG, GIF ou WEBP.',
            'image.max' => 'A imagem não pode ter mais de 2MB.',
        ];
    }
}
