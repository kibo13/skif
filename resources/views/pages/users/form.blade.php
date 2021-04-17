@extends('layouts.master')
<!-- user-form -->
@section('content')
<section id="user-form" class="section">
  <h2 class="mb-3">
    @isset($user) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
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

          <!-- /.worker -->
          <h6 class="bk-form__title">
            Сотрудник
            <small class="text-muted align-text-top" id="user-position">
            @isset($user) 
              {{ $user->worker->position->name }}
            @endisset 
            </small>
          </h6>
          <div class="bk-form__field-250 mb-2">
            <select
              class="form-control bk-form__input @error('worker_id') is-invalid @enderror"
              id="worker-select"
              name="worker_id"   
              @isset($user) 
                disabled
                tabindex="-1"
              @endisset     
            >
              <option disabled selected>Выберите сотрудника</option>
              @foreach($workers as $worker)
              <option 
                value="{{ $worker->id }}" 
                data-position="{{ $worker->position->name }}"
                data-fio="{{ $worker->fio }}"
                @isset($user) 
                  @if($user->worker_id == $worker->id) 
                    selected 
                  @endif 
                @endisset 
              >   
                {{ $worker->fio }}
              </option>
              @endforeach
            </select>

            @isset($user)
            <input 
              class="form-control bk-form__input"
              type="hidden" 
              name="worker_id" 
              value="{{ $user->worker->id }}"
            >
						@endisset

            @error('worker_id')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- /.login -->
          <h6 class="bk-form__title">Логин</h6>
          <div class="bk-form__field-250 mb-2 bk-access" id="user-login">
            <input
              class="form-control bk-form__input @error('name') is-invalid @enderror"
              type="text"
              name="name"
              value="{{ old('name', isset($user) ? $user->name : null) }}"
              placeholder="Введите логин"
              autocomplete="off"
              tabindex="-1"
            />

            @error('name')
            <span class="bk-form__alert invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- /.access-to-login -->
          <div class="d-flex my-1" style="user-select: none" >
            <input
              class="form-control bk-form__check"
              id="access-login"
              type="checkbox"
              tabindex="-1"
              @isset($user) 
                disabled
              @endisset     
            />
            <label class="bk-form__label" for="access-login">
             редактировать логин
            </label>
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
              @isset($user) 
                disabled
                tabindex="-1"
              @endisset  
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
