<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
        if ($this->route()->named('customers.store')) {
            $rules = [
                'email' => ['required', 'email', 'unique:customers'],
                'code' => ['required', 'min:12', 'max:12', 'unique:customers'],
                'type_id' => ['required'],
                'firstname' => ['nullable'],
                'lastname' => ['nullable'],
                'surname' => ['nullable'],
                'name' => ['nullable'],
                'address' => ['required'],
                'phone' => ['required'],
                'fio' => ['nullable']
            ];
        };  

        if ($this->route()->named('customers.update')) {
            $rules = [
                'email' => [
                    'required', 
                    'email', 
                    Rule::unique('customers')->ignore($this->route()->parameter('customer')->id)
                ],
                'code' => [
                    'required', 
                    'min:12', 
                    'max:12',
                    Rule::unique('customers')->ignore($this->route()->parameter('customer')->id)
                ],
                'type_id' => ['nullable'],
                'firstname' => ['nullable'],
                'lastname' => ['nullable'],
                'surname' => ['nullable'],
                'name' => ['nullable'],
                'address' => ['required'],
                'phone' => ['required'],
                'fio' => ['nullable']
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
            'name' => 'наименование организации',
            'type_id' => 'тип клиента',
            'code' => 'ИИН/БИН',
            'firstname' => 'имя',
            'lastname' => 'фамилия',
            'surname' => 'отчество',
            'email' => 'электронный адрес',
            'phone' => 'телефон',
            'address' => 'адрес'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'max' => 'Максимальная длина поля :max символов',
            'min' => 'Минимальная длина поля :min символов',
            'unique' => 'Такой :attribute уже существует'
        ];
    }
}
