<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|file',
            'category_id' => 'required',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Це поле необхідне до заповнення',
            'title.string' => 'Дані повинні бути в строковому форматі',
            'content.required' => 'Це поле необхідне до заповнення',
            'content.string'=> 'Дані повинні бути в строковому форматі',
            'image.required' => 'Це поле необхідне до заповнення',
            'image.file' => 'Дані повинні бути файлом',
            'category_id.required' => 'Це поле необхідне до заповнення',
            'category_id.integer' => 'ID категорії повинен бути чіслом',
            'category_id.exists' => 'Категорія не існує',
            'tag_ids.array' => 'Необіхідно відправити масив даних'

        ];
    }
}
