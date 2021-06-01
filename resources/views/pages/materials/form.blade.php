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

          <!-- /.type of material -->
          <h6 class="bk-form__title">Тип материала</h6>
          <div class="bk-form__field-300 mb-2">
            <select 
              class="form-control bk-form__input" 
              id="material-tom" 
              name="tom" >
							<option disabled selected>Выберите тип материала</option>
							@foreach($toms as $tom)
							<option 
                value="{{ $tom['id'] }}" 
                @isset($material) 
                  @if($material->tom == $tom['id'])
								    selected
								  @endif
								@endisset >
								{{ $tom['name'] }}
							</option>
							@endforeach
						</select>         
          </div>

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

          <!-- /.measure -->
          <h6 class="bk-form__title">Единица измерения</h6>
          <div class="bk-form__field-200 mb-2">
            <select 
              class="form-control bk-form__input" 
              id="material-measure" 
              name="measure" >
							<option disabled selected>Выберите ед.изм.</option>
							@foreach($measures as $measure)
							<option 
                value="{{ $measure['name'] }}" 
                @isset($material) 
                  @if($material->measure == $measure['name'])
								    selected
								  @endif
								@endisset >
								{{ $measure['name'] }}
							</option>
							@endforeach
						</select>         
          </div>

          <!-- /.sizes -->
          <div id="material-sizes" class="d-none">
            <h6 class="bk-form__title">
              Размеры
              <small class="text-muted align-text-top">мм</small>
            </h6>
            <div class="bk-form__field-inbox mb-2">
              <div>
                <h6 class="bk-form__title">Длина</h6>
                <input
                  class="form-control bk-form__input bk-valid"
                  id="price"
                  type="text"
                  name="L"
                  value="@isset($material) {{ $material->L }} @endisset"
                  maxlength="4"
                />
              </div>
              <div>
                <h6 class="bk-form__title">Ширина</h6>
                <input
                  class="form-control bk-form__input bk-valid"
                  id="price"
                  type="text"
                  name="B"
                  value="@isset($material) {{ $material->B }} @endisset"
                  maxlength="4"
                />
              </div>
              <div>
                <h6 class="bk-form__title">Высота</h6>
                <input
                  class="form-control bk-form__input bk-valid"
                  id="price"
                  type="text"
                  name="H"
                  value="@isset($material) {{ $material->H }} @endisset"
                  maxlength="4"
                />
              </div>
            </div>
          </div>

          <!-- /.colors -->
          <div id="material-colors" class="d-none">
            <h6 class="bk-form__title">Каталог цветов</h6>
            <div class="bk-form__field-full mb-2">
              <ul class="bk-checks">
                @foreach($colors as $id => $color)
                <li class="bk-checks__item" title="{{ $color->name }}">
                  <img 
                    class="bk-checks__img" 
                    src="{{asset('images/' . $color->image)}}" 
                    alt="{{ $color->name }}" >
                  <input 
                    class="bk-checks__checkbox bk-toms__checkbox" 
                    id="{{ $id }}" 
                    type="checkbox"
                    name="colors[]"
                    value="{{ $color->id }}"
                    @isset($material) 
                      @if($material->colors->where('id', $color->id)->count())
                        checked
                      @endif
                    @endisset >
                  <label class="bk-checks__label" for="{{ $id }}"></label>
                </li>
                @endforeach            
              </ul>
            </div>  
          </div>

          <!-- /.note -->
          <h6 class="bk-form__title">Примечание</h6>
          <div class="bk-form__field-full">
            <textarea class="form-control bk-form__text" name="note" placeholder="Дополнительные сведения">{{ old('note', isset($material) ? $material->note : null) }}</textarea>
          </div>

        </div>
      </div>

      <div class="form-group">
        <button 
          class="btn btn-outline-success" 
          id="material-save"
          type="submit">Сохранить</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('materials.index') }}">
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
