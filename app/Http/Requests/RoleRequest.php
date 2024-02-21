<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
    return auth()->user()->hasRole('Super Admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->method()==='PUT') {
            return [
                'name'=>['
                required']];
        }
        return [
        'name'=>['
        required',
        'unique:roles,name'
    ],
        ];
    }
    public function messages(): array
    {

        return [
        'name.required'=>'Campo nome é obrigatório!',
        'name.unique'=>'Essa permissão já existe!',
        ];
    }
}
