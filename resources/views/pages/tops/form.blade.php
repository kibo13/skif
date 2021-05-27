@extends('layouts.master')
<!-- top-form -->
@section('content')
<section id="top-form" class="valid-form img-form section">
  <h2 class="mb-3">
    @isset($top) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($top)
      action="{{ route('products.tops.update', ['product' => $product, 'top' => $top]) }}"
    @else
      action="{{ route('products.tops.store', $product) }}"
    @endisset >
    @csrf

    <div>
      @isset($top) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.product -->
          <h6 class="bk-form__title">Наименование мебели</h6>
          <div class="bk-form__field-full">
            <p class="bk-tops__text">{{ $product->name }}</p>
          </div>

          <!-- /.sizes -->
          <div class="bk-products__sizes">
            <h6 class="bk-form__title">
              Длина
              <small class="text-muted align-text-top">мм</small>
            </h6>
            <div class="bk-form__field-full">
              <p class="bk-tops__text">{{ $product->L }}</p>
            </div>
            <h6 class="bk-form__title">
              Ширина
              <small class="text-muted align-text-top">мм</small>
            </h6>
            <div class="bk-form__field-full">
              <p class="bk-tops__text">{{ $product->B }}</p>
            </div>
            <h6 class="bk-form__title">
              Высота
              <small class="text-muted align-text-top">мм</small>
            </h6>
            <div class="bk-form__field-full">
              <p class="bk-tops__text">{{ $product->H }}</p>
            </div>
          </div>

          <!-- /.product_id -->
          <input 
            class="form-control bk-form__input mb-2"
            type="hidden" 
            name="product_id" 
            value="{{ $product->id }}" 
          >

          <!-- /.materials -->
          <h6 class="bk-form__title">Каталог цветов</h6>
          <div class="bk-form__field-full mb-2">
            <ul class="bk-checks">
              @foreach($product->material->colors as $id => $color)
              <li class="bk-checks__item" title="{{ $color->name }}">
                <img 
                  class="bk-checks__img" 
                  src="{{asset('images/' . $color->image)}}" 
                  alt="{{ $color->name }}" >
                <input 
                  class="bk-checks__checkbox" 
                  id="{{ $id }}" 
                  type="radio"
                  name="color_id"
                  value="{{ $color->id }}"
                  @isset($top) 
                    @if($top->color_id == $color->id)
                      checked
                    @endif
                  @else 
                    @if($color->id == 1)
                      checked
                    @endif
                  @endisset >
                <label class="bk-checks__label" for="{{ $id }}"></label>
              </li>
              @endforeach            
            </ul>
          </div>    

          <!-- /.image -->
          <h6 class="bk-form__title">Изображение</h6>
          <div class="bk-form__field-300 mb-2">
            <div class="bk-form__file">
              <input
                class="form-control bk-form__input"
                id="upload-file"
                name="note"
                type="text"
                value="{{ isset($top) ? $top->note : null }}"
                placeholder="Файл не выбран" />

              <button 
                class="btn btn-primary bk-form__file--btn">
                Загрузить
              </button>

              <input 
                class="form-control-file bk-form__file--upload" 
                id="image"
                name="image"
                type="file"
                accept="image/*" >
            </div>            
          </div>
          
        </div>
      </div>

      <div class="form-group">
        <button 
          class="btn btn-outline-success" 
          id="top-save"
          type="submit" >
          Сохранить
        </button>
        <a 
          class="btn btn-outline-secondary" 
          href="{{ route('products.tops', $product) }}" >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
