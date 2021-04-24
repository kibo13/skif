@extends('layouts.master')
<!-- material-form -->
@section('content')
<section id="material-form" class="valid-form img-form section">
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
    enctype="multipart/form-data"
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
              class="form-control bk-form__input"
              id="name"
              type="text"
              name="name"
              value="@isset($material) {{ $material->name }} @endisset"
              placeholder="Введите наименование"
              autocomplete="off"
            />
          </div>


          <!-- /.price -->
          <h6 class="bk-form__title">Цена</h6>
          <div class="bk-form__field-100 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="price"
              type="text"
              name="price"
              value="@isset($material) {{ $material->price }} @endisset"
              maxlength="7"
              placeholder="1 250"
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
                value="@isset($material) {{ $material->note }} @endisset"
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
          href="{{ route('materials.index') }}"
        >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
