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
      @isset($user) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.lastname -->
          <h6 class="bk-form__title">Фамилия</h6>
          <div class="bk-form__field-250 mb-2">
            <input
            class="form-control bk-form__input @error('lastname') is-invalid @enderror"
              id="lastname"
              type="text"
              name="lastname"
              value="@isset($user) {{ $user->lastname }} @endisset"
              placeholder="Введите фамилию"
            />

            @error('lastname')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- /.firstname -->
          <h6 class="bk-form__title">Имя</h6>
          <div class="bk-form__field-250 mb-2">
            <input
            class="form-control bk-form__input @error('firstname') is-invalid @enderror"
              id="firstname"
              type="text"
              name="firstname"
              value="@isset($user) {{ $user->firstname }} @endisset"
              placeholder="Введите имя"
            />

            @error('firstname')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
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
            />
          </div>

          <!-- /.position -->
          <h6 class="bk-form__title">
            Должность
          </h6>
          <div class="bk-form__field-250 mb-2">
            <select
            class="form-control bk-form__input @error('position_id') is-invalid @enderror"
              id="position-select"
              name="position_id"              
            >
              <option disabled selected>Выберите должность</option>
              @foreach($positions as $position)
              <option 
                value="{{ $position->id }}" 
                data-salary="{{ $position->salary }}" 
                @isset($user) 
                  @if($user->position_id == $position->id) 
                    selected 
                  @endif 
                @endisset 
              >
                  {{ ucfirst($position->name) }}
              </option>
              @endforeach
            </select>

            @error('position_id')
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
              class="form-control bk-form__input @error('name') is-invalid @enderror"
              type="text"
              name="name"
              value="{{ old('name', isset($user) ? $user->name : null) }}"
              placeholder="Введите логин"
              autocomplete="off"
            />

            @error('name')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
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
              class="form-control bk-form__input @error('password') is-invalid @enderror"
              id="password"
              type="password"
              name="password"
              placeholder="Пароль"
              autocomplete="off"
            />
          </div>

          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input @error('password') is-invalid @enderror"
              id="confirm-password"
              type="password"
              name="password_confirmation"
              placeholder="Подтверждение"
              autocomplete="off"
            />
            @error('password')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- /.role -->
          <h6 class="bk-form__title">Роль</h6>
          <div class="bk-form__field-250">
            <select
              class="form-control bk-form__input @error('role_id') is-invalid @enderror"
              id="role-select"
            >
              <option disabled selected>Выберите роль</option>
              @foreach($roles as $role)
              <option
                value="{{ $role->id }}"
                data-slug="{{ $role->slug }}"
                @isset($user)
                  @if($user->role_id == $role->id) 
                    selected 
                  @endif 
                @endisset>

                {{ $role->name }}

              </option>
              @endforeach
            </select>

            <input
              id="user-slug"
              type="hidden"
              name="role_id"
              value="{{ old('role_id', isset($user) ? $user->role_id : null) }}"
            />

            @error('role_id')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
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
