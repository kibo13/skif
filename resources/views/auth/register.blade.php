@extends('auth.layouts.master') @section('content')
<div class="auth-wrapper">
  <div class="auth-form">
    <div class="logo logo-auth">
      <img
        class="logo-icon logo-icon--md"
        src="{{ asset('images/logo.png') }}"
        alt="logo"
      />
      <h5 class="logo-title">ИС "СКИФ"</h5>
    </div>

    <h5 class="mb-3 text-center text-uppercase">{{ __('Register') }}</h5>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="form-group">
        <input
          id="name"
          type="text"
          class="form-control @error('name') is-invalid @enderror"
          name="name"
          value="{{ old('name') }}"
          required
          autocomplete="name"
          autofocus
          placeholder="Логин"
        />

        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group">
        <input
          id="password"
          type="password"
          class="form-control @error('password') is-invalid @enderror"
          name="password"
          required
          placeholder="Пароль"
        />

        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group">
        <input
          id="password-confirm"
          type="password"
          class="form-control"
          name="password_confirmation"
          required
          placeholder="Подтверждение"
        />
      </div>

      <div class="form-group mb-0 text-center">
        <button type="submit" class="btn btn-primary">
          {{ __('Register') }}
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
