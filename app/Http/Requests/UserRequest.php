<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class   UserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>[
                'required',
                'email',
                Rule::unique('users')->ignore($this->user?->id)
            ],
            'password'=>[
                'confirmed',
                Rule::requiredIf(fn()=>!$this->user)
            ],
            'role_id'=>'required',
        ];
    }
    public function attributes(){
        return [
            'name'=>'nome',
            'email'=>'email',
            'password'=>'senha',
            'role_id'=>'role_id',
        ];
    }
}
