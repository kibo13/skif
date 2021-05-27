@extends('layouts.master')
<!-- supplier-form -->
@section('content')
<section id="supplier-form" class="valid-form section">
  <h2 class="mb-3">
    @isset($supplier) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>
  <form
    class="bk-form"
    method="POST"
    @isset($supplier)
      action="{{ route('suppliers.update', $supplier) }}"
    @else
      action="{{ route('suppliers.store') }}"
    @endisset
  >
    @csrf

    <div>
      @isset($supplier) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.name -->
          <h6 class="bk-form__title">Наименование</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="name"
              type="text"
              name="name"
              value="@isset($supplier) {{ $supplier->name }} @endisset"
              placeholder="ИП Ивановы"
              required
            /> 
          </div>     
          
          <!-- /.code -->
          <h6 class="bk-form__title">БИН</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid @error('code') is-invalid @enderror"
              id="code"
              type="text"
              name="code"
              value="@isset($supplier) {{ $supplier->code }} @endisset"
              minlength="12"
              maxlength="12"
              placeholder="Введите БИН"
              required
            />  
            
            @error('code')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>  
          
          <!-- /.lastname -->
          <h6 class="bk-form__title">Фамилия</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="lastname"
              type="text"
              name="lastname"
              value="@isset($supplier) {{ $supplier->lastname }} @endisset"
              placeholder="Иванов"
              required
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
              value="@isset($supplier) {{ $supplier->firstname }} @endisset"
              placeholder="Иван"
              required
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
              value="@isset($supplier) {{ $supplier->surname }} @endisset"
              placeholder="Иванович"
              required
            />
          </div>

          <!-- /.fio -->
          <input
            class="form-control bk-form__input mb-2"
            style="width: 250px;"
            id="fio"
            type="hidden"
            name="fio"
            value="@isset($supplier) {{ $supplier->fio }} @endisset"
          />

          <!-- /.country -->
          <h6 class="bk-form__title">Страна</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="country"
              type="text"
              name="country"
              value="@isset($supplier) {{ $supplier->country }} @endisset"
              placeholder="Россия"
              required
            />
          </div>

          <!-- /.city -->
          <h6 class="bk-form__title">Город</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="city"
              type="text"
              name="city"
              value="@isset($supplier) {{ $supplier->city }} @endisset"
              placeholder="Люберцы"
              required
            />
          </div>

          <!-- /.index -->
          <h6 class="bk-form__title">Индекс</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="index"
              type="text"
              name="index"
              value="@isset($supplier) {{ $supplier->index }} @endisset"
              minlength="6"
              maxlength="6"
              placeholder="109153"
              required
            />
          </div>

          <!-- /.address -->
          <h6 class="bk-form__title">Адрес</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="address"
              type="text"
              name="address"
              value="@isset($supplier) {{ $supplier->address }} @endisset"
              placeholder="ул.Николоямская, д.29, стр.1"
              required
            />
          </div>

          <!-- /.email -->
          <h6 class="bk-form__title">Электронная почта</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="email"
              type="email"
              name="email"
              value="@isset($supplier) {{ $supplier->email }} @endisset"
              placeholder="info@example.ru"
            />
          </div>

          <!-- /.phone -->
          <h6 class="bk-form__title">Телефон</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="phone"
              type="text"
              name="phone"
              value="@isset($supplier) {{ $supplier->phone }} @endisset"
              placeholder="+7 (495) 123-45-67"
            />
          </div>
          
        </div>
      </div>

      <div class="form-group">
        <button 
          class="btn btn-outline-success" 
          id="supplier-save"
          type="submit">
          Сохранить
        </button>
        <a 
          class="btn btn-outline-secondary" 
          href="{{ route('suppliers.index') }}">
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
