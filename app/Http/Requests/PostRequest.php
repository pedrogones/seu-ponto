<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Traits\HasRole;
class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     public function prepareForValidation(){
       if(!$this->user()->hasRoles(['Admin', 'Super Admin'])){
        $this->merge([
            'user_id'=>auth()->id(),
        ]);
       }
     }

    public function authorize(): bool
    {
        return $this->user()->can('post_create');
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
            'content'=>'required',
            'user_id'=>[
                'exists:users,id',
                'sometimes',
                Rule::requiredIf(function(){
                    return ($this->user()->hasRoles(['Admin', 'Super Admin']));
                })
            ],
        ];
    }
    public function messages():array{
        return [
            'title.required'=>'O titulo é obrigatório!',
            'content.required'=>'O conteudo é obrigatório!',
            'user_id'=>'selecionar um usuário é obrigatório!',
        ];
    }
}
