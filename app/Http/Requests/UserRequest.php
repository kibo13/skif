<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        if ($this->route()->named('users.store')) {
            $rules = [
                'name' => [
                    'required', 
                    'string', 
                    'min:3', 
                    'max:20', 
                    'unique:users'
                ],

                'password' => [
                    'required', 
                    'string', 
                    'min:8', 
                    'max:16', 
                    'confirmed'
                ],

                'role_id' => ['required'],
                'firstname' => ['required'],
                'lastname' => ['required'],
                'position_id' => ['required']
            ];
        };  

        if ($this->route()->named('users.update')) {
            $rules = [
                'name' => [
                    'required', 
                    'string', 
                    'min:3', 
                    'max:20', 
                    Rule::unique('users')->ignore($this->route()->parameter('user')->id)
                ],

                'password' => [
                    'nullable', 
                    'string', 
                    'min:8', 
                    'max:16', 
                    'confirmed'
                ],

                'role_id' => ['required'],
                'firstname' => ['required'],
                'lastname' => ['required'],
                'position_id' => ['required']
            ];
        };

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'логин',
            'password' => 'пароль',
            'role_id' => 'роль',
            'firstname' => 'имя',
            'lastname' => 'фамилия',
            'position_id' => 'должность'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'max' => 'Максимальная длина поля :max символов',
            'min' => 'Минимальная длина поля :min символов',
            'confirmed' => 'Пароли не совпадают',
            'unique' => 'Выбранный :attribute уже существует'
        ];
    }
}
