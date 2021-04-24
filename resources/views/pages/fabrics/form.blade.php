@extends('layouts.master')
<!-- fabric-form -->
@section('content')
<section id="fabric-form" class="valid-form section">
  <h2 class="mb-3">
    @isset($fabric) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($fabric)
      action="{{ route('fabrics.update', $fabric) }}"
    @else
      action="{{ route('fabrics.store') }}"
    @endisset
  >
    @csrf
    <div>
      @isset($fabric) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">
          <!-- /.fabric -->
          <h6 class="bk-form__title">Наименование</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="name"
              type="text"
              name="name"
              value="@isset($fabric) {{ $fabric->name }} @endisset"
              placeholder="Введите наименование"
              required
            />
          </div>

          <!-- /.description -->
          <h6 class="bk-form__title">Описание</h6>
          <div class="bk-form__field-full">
            <textarea class="form-control bk-form__text" name="description" placeholder="Введите описание">{{ old('description', isset($fabric) ? $fabric->description : null) }}</textarea>
          </div>

        </div>
      </div>

      <div class="form-group">
        <button class="btn btn-outline-success" type="submit">Сохранить</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('fabrics.index') }}"
        >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
