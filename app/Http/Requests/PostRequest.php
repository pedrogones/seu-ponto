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
            'title'=>'required',
            'email'=>'required|email',
            'user_id'=>'required',
        ];
    }
    public function messages():array{
        return [
            'title.required'=>'titulo é obrigatório!',
            'email.required'=>'email é obrigatório!',
            'user_id'=>'selecionar um usuário é obrigatório!',
        ];
    }
}
