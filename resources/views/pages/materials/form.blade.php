@extends('layouts.master')
<!-- material-form -->
@section('content')
<section id="material-form" class="valid-form section">
  <h2 class="mb-3">
    @isset($material)
      Редактирование записи
    @else
      Добавление записи
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    @isset($material)
      action="{{ route('materials.update', $material) }}"
    @else
      action="{{ route('materials.store') }}"
    @endisset
  >
    @csrf
    <div>
      @isset($material)
        @method('PUT')
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.material -->
          <h6 class="bk-form__title">Наименование</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="name"
              type="text"
              name="name"
              value="@isset($material) {{ $material->name }} @endisset"
              placeholder="Введите наименование"
              required
            />
          </div>

          <!-- /.note -->
          <h6 class="bk-form__title">Примечание</h6>
          <div class="bk-form__field-full">
            <textarea class="form-control bk-form__text" name="note" placeholder="Дополнительные сведения">{{ old('note', isset($material) ? $material->note : null) }}</textarea>
          </div>

        </div>
      </div>

      <div class="form-group">
        <button class="btn btn-outline-success" type="submit">Сохранить</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('materials.index') }}"
        >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
