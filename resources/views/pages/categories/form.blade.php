@extends('layouts.master')
<!-- category-form -->
@section('content')
<section id="category-form" class="valid-form img-form section">
  <h2 class="mb-3">
    @isset($category) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($category)
      action="{{ route('categories.update', $category) }}"
    @else
      action="{{ route('categories.store') }}"
    @endisset
  >
    @csrf
    <div>
      @isset($category) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">
          <!-- /.category -->
          <h6 class="bk-form__title">Категория</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="name"
              type="text"
              name="name"
              value="@isset($category) {{ $category->name }} @endisset"
              placeholder="Новая категория"
              required
            />
          </div>

          <!-- /.description -->
          <h6 class="bk-form__title">Описание</h6>
          <div class="bk-form__field-full mb-2">
            <textarea class="form-control bk-form__text" name="description" placeholder="Краткое описание категории">{{ old('description', isset($category) ? $category->description : null) }}</textarea>
          </div>

          <!-- /.image -->
          <h6 class="bk-form__title">Изображение</h6>
          <div class="bk-form__field-300">
            <div class="bk-form__file">
              <input
                class="form-control bk-form__input"
                id="upload-file"
                name="note"
                type="text"
                value="@isset($category) {{ $category->note }} @endisset"
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
          href="{{ route('categories.index') }}"
        >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
