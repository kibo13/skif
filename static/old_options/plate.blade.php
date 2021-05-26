@extends('layouts.master')
<!-- plate-form -->
@section('content')
<section id="plate-form" class="valid-form img-form section">
  <h2 class="mb-3">
    @isset($plate) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($plate)
      action="{{ route('plates.update', $plate) }}"
    @else
      action="{{ route('plates.store') }}"
    @endisset
  >
    @csrf
    <div>
      @isset($plate) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.plate -->
          <h6 class="bk-form__title">Наименование</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control bk-form__input"
              id="name"
              type="text"
              name="name"
              value="@isset($plate) {{ $plate->name }} @endisset"
              placeholder="Введите наименование"
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
                value="@isset($plate) {{ $plate->note }} @endisset"
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
          href="{{ route('colors.index') }}" >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
