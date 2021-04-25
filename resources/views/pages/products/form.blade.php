@extends('layouts.master')
<!-- product-form -->
@section('content')
<section id="product-form" class="valid-form img-form section">
  <h2 class="mb-3">
    @isset($product) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>
  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($product)
      action="{{ route('products.update', $product) }}"
    @else
      action="{{ route('products.store') }}"
    @endisset
  >
    @csrf

    <div>
      @isset($product) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.category -->
          <h6 class="bk-form__title">Категория</h6>
          <div class="bk-form__field-250 mb-2">
            <select 
              class="form-control bk-form__input"
              id="category_id"
              name="category_id" 
            >
							<option disabled selected>Выберите категорию</option>
							@foreach($categories as $category)
							<option 
                value="{{ $category->id }}" 
                @isset($product) 
                  @if($product->category_id == $category->id)
								    selected
								  @endif
								@endisset
							>
								{{ ucfirst($category->name) }}
							</option>
							@endforeach
						</select>
          </div>

          <!-- /.product -->
          <h6 class="bk-form__title">Наименование</h6>
          <div class="bk-form__field-full mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="name"
              type="text"
              name="name"
              value="@isset($product) {{ $product->name }} @endisset"
              placeholder="Введите наименование"
            />
          </div>

          <!-- /.sizes -->
          <h6 class="bk-form__title">
            Размеры
            <small class="text-muted align-text-top">см</small>
          </h6>
          <div class="bk-form__field-inbox mb-2">
            <div>
              <h6 class="bk-form__title">Длина</h6>
              <input
                class="form-control bk-form__input bk-valid"
                id="price"
                type="text"
                name="L"
                value="@isset($product) {{ $product->L }} @endisset"
                maxlength="4"
                required
              />
            </div>
            <div>
              <h6 class="bk-form__title">Ширина</h6>
              <input
                class="form-control bk-form__input bk-valid"
                id="price"
                type="text"
                name="B"
                value="@isset($product) {{ $product->B }} @endisset"
                maxlength="4"
                required
              />
            </div>
            <div>
              <h6 class="bk-form__title">Высота</h6>
              <input
                class="form-control bk-form__input bk-valid"
                id="price"
                type="text"
                name="H"
                value="@isset($product) {{ $product->H }} @endisset"
                maxlength="4"
                required
              />
            </div>
          </div>

          <!-- /.price -->
          <h6 class="bk-form__title">Цена</h6>
          <div class="bk-form__field-100 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="price"
              type="text"
              name="price"
              value="@isset($product) {{ $product->price }} @endisset"
              maxlength="7"
              placeholder="1 250"
              required
            />
          </div>

          <!-- /.description -->
          <h6 class="bk-form__title">Описание</h6>
          <div class="bk-form__field-full mb-2">
            <textarea class="form-control bk-form__text" name="description" placeholder="Введите описание">{{ old('description', isset($product) ? $product->description : null) }}</textarea>
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
                value="@isset($product) {{ $product->note }} @endisset"
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
        
        <button 
          class="btn btn-outline-success" 
          id="worker-save"
          type="submit"
        >
          Сохранить
        </button>
        <a 
          class="btn btn-outline-secondary" 
          href="{{ route('products.index') }}"
        >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
