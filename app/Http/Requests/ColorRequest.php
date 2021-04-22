<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ColorRequest extends FormRequest
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
        if ($this->route()->named('colors.store')) {
            $rules = [
                'name' => [
                    'required', 
                    'string', 
                    'unique:colors'
                ],
                'image' => ['nullable'],
                'note' => ['nullable']
            ];
        };  

        if ($this->route()->named('colors.update')) {
            $rules = [
                'name' => [
                    'required', 
                    'string', 
                    Rule::unique('colors')->ignore($this->route()->parameter('color')->id)
                ],
                'image' => ['nullable'],
                'note' => ['nullable']
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
            'name' => 'название цвета'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'unique' => 'Такое :attribute уже существует'
        ];
    }
}
