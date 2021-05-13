@extends('layouts.master')
<!-- position-form -->
@section('content')
<section id="position-form" class="valid-form section">
  <h2 class="mb-3">
    @isset($position)
      Редактирование записи
    @else
      Добавление записи
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    @isset($position)
      action="{{ route('positions.update', $position) }}"
    @else
      action="{{ route('positions.store') }}"
    @endisset >
    @csrf
    <div>
      @isset($position)
        @method('PUT')
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">
          <!-- /.position -->
          <h6 class="bk-form__title">Должность</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="name"
              type="text"
              name="name"
              value="@isset($position) {{ $position->name }} @endisset"
              placeholder="Новая должность"
              required />
          </div>
          <!-- /.salary -->
          <h6 class="bk-form__title">Оклад</h6>
          <div class="bk-form__field-100">
            <input
              class="form-control bk-form__input bk-valid"
              id="price"
              type="text"
              name="salary"
              value="@isset($position) {{ $position->salary }} @endisset"
              maxlength="7"
              placeholder="35 000"
              required
            />
          </div>
        </div>
      </div>

      <div class="form-group">
        <button class="btn btn-outline-success" type="submit">Сохранить</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('positions.index') }}"
        >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
