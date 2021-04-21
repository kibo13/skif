@extends('layouts.master')
<!-- color-form -->
@section('content')
<section id="color-form" class="section">
  <h2 class="mb-3">
    @isset($color) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($color)
      action="{{ route('colors.update', $color) }}"
    @else
      action="{{ route('colors.store') }}"
    @endisset
  >
    @csrf
    <div>
      @isset($color) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">
          <!-- /.color -->
          <h6 class="bk-form__title">Название цвета</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="name"
              type="text"
              name="name"
              value="@isset($color) {{ $color->name }} @endisset"
              placeholder="Новый цвет"
              required
            />
          </div>

          <!-- /.image -->
          <h6 class="bk-form__title">Образец</h6>
          <div class="bk-form__field-300">
            <div class="bk-form__file">
              <input
                class="form-control bk-form__input"
                id="upload-file"
                name="note"
                type="text"
                value="@isset($color) {{ $color->note }} @endisset"
                placeholder="Файл не выбран"
              />

              <button 
                class="btn btn-primary bk-form__file--btn">
                Загрузить
              </button>

              <input 
                class="form-control-file bk-form__file--upload" 
                id="image"
                name="image"
                type="file"
                accept="image/*"
              >
            </div>            
          </div>
        </div>
      </div>

      <div class="form-group">
        <button class="btn btn-outline-success" type="submit">Сохранить</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('colors.index') }}"
        >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
