<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            
            'name' => 'required|string',
            'email' => 'required|email|string',
            'role' => 'required|integer',
            
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Поле email обовязкове для заповнення',
            'email.email' => 'Поле email повинно відповідати формату email',
            'email.unique' => 'Користува з таким email уже зареєстрований',
            'name.required' => 'Поле name обовязкове до заповнення',
            'name.string' => 'Поле name повинно буть строкой',
        ];
    }
}
