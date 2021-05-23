@extends('layouts.master')
<!-- type-form -->
@section('content')
<section id="type-form" class="valid-form img-form section">
  <h2 class="mb-3">
    @isset($type) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($type)
      action="{{ route('products.types.update', ['product' => $product, 'type' => $type]) }}"
    @else
      action="{{ route('products.types.store', $product) }}"
    @endisset >
    @csrf

    <div>
      @isset($type) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.product -->
          <h6 class="bk-form__title">Наименование мебели</h6>
          <div class="bk-form__field-full">
            <p class="bk-types__text">{{ $product->name }}</p>
          </div>

          <!-- /.sizes -->
          <div class="bk-products__sizes">
            <h6 class="bk-form__title">
              Длина
              <small class="text-muted align-text-top">мм</small>
            </h6>
            <div class="bk-form__field-full">
              <p class="bk-types__text">{{ $product->L }}</p>
            </div>
            <h6 class="bk-form__title">
              Ширина
              <small class="text-muted align-text-top">мм</small>
            </h6>
            <div class="bk-form__field-full">
              <p class="bk-types__text">{{ $product->B }}</p>
            </div>
            <h6 class="bk-form__title">
              Высота
              <small class="text-muted align-text-top">мм</small>
            </h6>
            <div class="bk-form__field-full">
              <p class="bk-types__text">{{ $product->H }}</p>
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
            @if($product->category->slug == 'soft')
            <!-- /.fabric_id -->
            <ul class="bk-checks">
              @foreach($fabrics as $id => $fabric)
              <li class="bk-checks__item" title="{{ $fabric->name }}">
                <div 
                  style="width: 100%; background-color: {{ $fabric->code }}" >
                </div>
                <input 
                  class="bk-checks__checkbox" 
                  id="{{ $id }}" 
                  type="radio"
                  name="fabric_id"
                  value="{{ $fabric->id }}" 
                  @isset($type) 
                    @if($type->fabric_id == $fabric->id)
                      checked="checked"
                    @endif
                  @else 
                    @if($fabric->id == 1)
                      checked
                    @endif
                  @endisset >
                <label class="bk-checks__label" for="{{ $id }}"></label>
              </li>
              @endforeach            
            </ul>
            @else 
            <!-- /.plate_id -->
            <ul class="bk-checks">
              @foreach($plates as $id => $plate)
              <li class="bk-checks__item" title="{{ $plate->name }}">
                <img 
                  class="bk-checks__img" 
                  src="{{asset('images/' . $plate->image)}}" 
                  alt="{{ $plate->name }}" >
                <input 
                  class="bk-checks__checkbox" 
                  id="{{ $id }}" 
                  type="radio"
                  name="plate_id"
                  value="{{ $plate->id }}"
                  @isset($type) 
                    @if($type->plate_id == $plate->id)
                      checked="checked"
                    @endif
                  @else 
                    @if($plate->id == 1)
                      checked
                    @endif
                  @endisset >
                <label class="bk-checks__label" for="{{ $id }}"></label>
              </li>
              @endforeach            
            </ul>
            @endif 
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
                value="{{ isset($type) ? $type->note : null }}"
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
          id="type-save"
          type="submit" >
          Сохранить
        </button>
        <a 
          class="btn btn-outline-secondary" 
          href="{{ route('products.types', $product) }}" >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
