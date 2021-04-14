@extends('layouts.master')
<!-- worker-form -->
@section('content')
<section id="worker-form" class="section">
  <h2 class="mb-3">
    @isset($user) Редактирование записи @else Добавление записи @endisset
  </h2>
  <form
    class="bk-form"
    method="POST"
    @isset($user)
    action="{{ route('users.update', $user) }}"
    @else
    action="{{ route('users.store') }}"
    @endisset
  >
    @csrf
    <div>
      @isset($worker) @method('PUT') @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">
          <!-- /.lastname -->
          <h6 class="bk-form__title">Фамилия</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="lastname"
              type="text"
              name="lastname"
              value="@isset($user) {{ $user->lastname }} @endisset"
              placeholder="Введите фамилию"
              required
            />
          </div>
          <!-- /.firstname -->
          <h6 class="bk-form__title">Имя</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="firstname"
              type="text"
              name="firstname"
              value="@isset($user) {{ $user->firstname }} @endisset"
              placeholder="Введите имя"
              required
            />
          </div>
          <!-- /.surname -->
          <h6 class="bk-form__title">Отчество</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="surname"
              type="text"
              name="surname"
              value="@isset($user) {{ $user->surname }} @endisset"
              placeholder="Введите отчетство"
              required
            />
          </div>
          <!-- /.position -->
          <h6 class="bk-form__title">Должность</h6>
          <div class="bk-form__field-250 mb-2">
            <select
              name="position_id"
              id="position_id"
              class="form-control bk-form__input"
            >
              <option disabled selected>Выберите должность</option>
              @foreach($positions as $position)
              <option value="{{ $position->id }}" @isset($user) @if($user->
                position_id == $position->id) selected @endif @endisset >
                {{ ucfirst($position->name) }}
              </option>
              @endforeach
            </select>
          </div>
          <!-- /.address -->
          <h6 class="bk-form__title">Адрес</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="address"
              type="text"
              name="address"
              value="@isset($user) {{ $user->address }} @endisset"
              placeholder="Введите адрес"
            />
          </div>

          <!-- /.phone -->
          <h6 class="bk-form__title">Телефон</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="phone"
              type="text"
              name="phone"
              value="@isset($user) {{ $user->phone }} @endisset"
              placeholder="Введите телефон"
            />
          </div>

          <!-- /.login -->
          <h6 class="bk-form__title">Логин</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="name"
              type="text"
              name="name"
              value="@isset($user) {{ $user->name }} @endisset"
              placeholder="Введите логин"
              autocomplete="off"
            />
          </div>

          <!-- /.password -->
          <h6 class="bk-form__title">
            Пароль
            <small class="text-muted align-top">
              мин.длина пароля 8 символов
            </small>
          </h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="name"
              type="text"
              name="name"
              value="@isset($user) {{ $user->name }} @endisset"
              placeholder="Пароль"
              autocomplete="off"
            />
          </div>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="name"
              type="text"
              name="name"
              value="@isset($user) {{ $user->name }} @endisset"
              placeholder="Подтверждение"
              autocomplete="off"
            />
          </div>
          <!-- /.role -->
          <h6 class="bk-form__title">Роль</h6>
          <div class="bk-form__field-250">
            <select
              name="role_id"
              id="role_id"
              class="form-control bk-form__input"
            >
              <option disabled selected>Выберите роль</option>
              @foreach($roles as $role)
              <option value="{{ $role->id }}" @isset($user) @if($user->
                role_id == $role->id) selected @endif @endisset >
                {{ ucfirst($role->name) }}
              </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <button class="btn btn-outline-success" type="submit">Сохранить</button>
        <a class="btn btn-outline-secondary" href="{{ route('users.index') }}">
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
