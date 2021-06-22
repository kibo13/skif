@extends('layouts.master')
<!-- customer-form -->
@section('content')
<section id="customer-form" class="valid-form section">
  <h2 class="mb-3">
    @isset($customer) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>
  <form
    class="bk-form"
    method="POST"
    @isset($customer)
      action="{{ route('customers.update', $customer) }}"
    @else
      action="{{ route('customers.store') }}"
    @endisset >
    @csrf

    <div>
      @isset($customer) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.type_customer -->
          <h6 class="bk-form__title">Тип клиента</h6>
          <ul class="bk-radio mb-2">
            @foreach($types as $type)
              <li class="bk-radio__item">
                <input 
                  class="bk-radio__toggle"
                  type="radio" 
                  name="type_id" 
                  id="{{ $type['id'] }}" 
                  value="{{ $type['id'] }}" 
                  @isset($customer) 
                    disabled
                    @if($customer->type_id == $type['id'])
                      checked="checked"
                    @endif
                  @else 
                    @if($type['id'] == 1)
                      checked
                    @endif
                  @endisset >
                <label class="bk-radio__label" for="{{ $type['id'] }}" >
                  {{ $type['name'] }}
                </label>
              </li>
            @endforeach
          </ul>
          
          <!-- /.code -->
          <h6 id="subject-title" class="bk-form__title">ИИН</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid @error('code') is-invalid @enderror"
              id="price"
              type="text"
              name="code"
              value="@isset($customer) {{ $customer->code }} @endisset"
              minlength="12"
              maxlength="12"
              placeholder="Введите ИИН"
              required
            />

            @error('code')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- /.individual -->
          <div id="individual-block">
            <!-- /.lastname -->
            <h6 class="bk-form__title">Фамилия</h6>
            <div class="bk-form__field-250 mb-2">
              <input
                class="form-control bk-form__input bk-valid"
                id="lastname"
                type="text"
                name="lastname"
                value="@isset($customer) {{ $customer->lastname }} @endisset"
                placeholder="Введите фамилию"
              />
            </div>

            <!-- /.firstname -->
            <h6 class="bk-form__title">Имя</h6>
            <div class="bk-form__field-250 mb-2">
              <input
                class="form-control bk-form__input bk-valid"
                id="firstname"
                type="text"
                name="firstname"
                value="@isset($customer) {{ $customer->firstname }} @endisset"
                placeholder="Введите имя"
              />
            </div>

            <!-- /.surname -->
            <h6 class="bk-form__title">Отчество</h6>
            <div class="bk-form__field-250 mb-2">
              <input
                class="form-control bk-form__input bk-valid"
                id="surname"
                type="text"
                name="surname"
                value="@isset($customer) {{ $customer->surname }} @endisset"
                placeholder="Введите отчество"
              />
            </div>
          </div>
          
          <!-- /.entity -->
          <div id="entity-block" class="d-none">
            <h6 class="bk-form__title">Наименование организации</h6>
            <div class="bk-form__field-250 mb-2">
              <input
                class="form-control bk-form__input"
                id="name"
                type="text"
                name="name"
                value="@isset($customer) {{ $customer->name }} @endisset"
                placeholder="Введите наименование"
              />
            </div>
          </div>

          <!-- /.email -->
          <h6 class="bk-form__title">Электронная почта</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input @error('email') is-invalid @enderror"
              id="email"
              type="email"
              name="email"
              value="@isset($customer) {{ $customer->email }} @endisset"
              placeholder="Введите почту"
              required
            />

            @error('email')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- /.address -->
          <h6 class="bk-form__title">Адрес</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="address"
              type="text"
              name="address"
              value="@isset($customer) {{ $customer->address }} @endisset"
              placeholder="Введите адрес"
              required
            />
          </div>

          <!-- /.phone -->
          <h6 class="bk-form__title">Телефон</h6>
          <div class="bk-form__field-250">
            <input
              class="form-control bk-form__input bk-valid"
              id="phone"
              type="text"
              name="phone"
              value="@isset($customer) {{ $customer->phone }} @endisset"
              placeholder="Введите телефон"
              required
            />
          </div>   
        </div>
      </div>

      <div class="form-group">
        <button 
          class="btn btn-outline-success" 
          id="customer-save"
          type="submit">
          Сохранить
        </button>
        <a 
          class="btn btn-outline-secondary" 
          href="{{ route('customers.index') }}">
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
