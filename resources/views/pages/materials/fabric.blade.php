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
    @isset($fabric)
      action="{{ route('fabrics.update', $fabric) }}"
    @else
      action="{{ route('fabrics.store') }}"
    @endisset >
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
              placeholder="Введите наименование" />

              <span class="bk-alert bk-alert__name d-none">
                <strong>Поле обязательно для заполнения</strong>
              </span>
          </div>

          <!-- /.code -->
          <h6 class="bk-form__title">Цвет</h6>
          <div class="bk-form__field-100">
            <input
              class="form-control bk-form__color"
              id="color"
              type="color" />          
          </div>

          <span class="bk-alert bk-alert__color d-none">
            <strong>Поле обязательно для заполнения</strong>
          </span>

          <input
            class="form-control bk-form__input mt-2"
            id="code"
            type="hidden"
            name="code"
            value="@isset($fabric) {{ $fabric->code }} @endisset"
            placeholder="Код цвета" />         

        </div>
      </div>

      <div class="form-group">
        <button 
          class="btn btn-outline-success" 
          id="fabric-save"
          type="submit" >Сохранить</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('materials.index') }}" >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
