<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
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
    if ($this->route()->named('suppliers.store')) {
      $rules = [
        'code' => ['required', 'min:12', 'max:12', 'unique:suppliers'],
        'name' => ['required'],
        'firstname' => ['required'],
        'lastname' => ['required'],
        'surname' => ['required'],
        'fio' => ['nullable'],
        'country' => ['required'],
        'city' => ['required'],
        'index' => ['required', 'min:6', 'max:6'],
        'address' => ['required'],
        'phone' => ['nullable'],
        'email' => ['nullable']
      ];
    };

    if ($this->route()->named('suppliers.update')) {
      $rules = [
        'code' => [
          'required',
          'min:12',
          'max:12',
          Rule::unique('suppliers')->ignore($this->route()->parameter('supplier')->id)
        ],
        'name' => ['required'],
        'firstname' => ['required'],
        'lastname' => ['required'],
        'surname' => ['required'],
        'fio' => ['nullable'],
        'country' => ['required'],
        'city' => ['required'],
        'index' => ['required', 'min:6', 'max:6'],
        'address' => ['required'],
        'phone' => ['nullable'],
        'email' => ['nullable']
      ];
    };

    return $rules;
  }

  public function messages()
  {
    return [
      'required' => 'Поле обязательно для заполнения',
      'max' => 'Максимальная длина поля :max символов',
      'min' => 'Минимальная длина поля :min символов',
      'unique' => 'Такая запись уже существует в БД'
    ];
  }
}
