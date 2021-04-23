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

          <!-- /.position -->
          <h6 class="bk-form__title">Вид древесины</h6>
          <div class="bk-form__field-250 mb-2">
            <select 
              class="form-control bk-form__input"
              id="tree_id"
              name="tree_id" 
            >
							<option disabled selected>Выберите материал</option>
							@foreach($trees as $tree)
							<option 
                value="{{ $tree->id }}" 
                @isset($material) 
                  @if($material->tree_id == $tree->id)
								    selected
								  @endif
								@endisset
							>
								{{ ucfirst($tree->name) }}
							</option>
							@endforeach
						</select>
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

          <!-- /.price -->
          <h6 class="bk-form__title">Каталог цветов</h6>

          {{-- <div class="custom-control custom-checkbox" >
            <input 
                id="{{ $id }}" 
                name="colors[]" 
                type="checkbox" 
                class="custom-control-input" 
                value="{{ $color->id }}" 
                @isset($material) 
                  @if($material->colors->where('id', $color->id)->count())
                    checked="checked"
                  @endif
                @endisset
              >
            <label class="custom-control-label" for="{{ $id }}">
              {{ $color->name }}
            </label>
          </div> --}}

          <ul class="bk-checks">
            @foreach($colors as $id => $color)
            <li class="bk-checks__item" title="{{ $color->name }}">
              <img 
                class="bk-checks__img" 
                src="{{asset('images/' . $color->image)}}" 
                alt="{{ $color->name }}">

              <input 
                class="bk-checks__checkbox" 
                id="{{ $id }}" 
                type="checkbox"
                name="colors[]"
                value="{{ $color->id }}" 
                @isset($material) 
                  @if($material->colors->where('id', $color->id)->count())
                    checked="checked"
                  @endif
                @endisset>

              <label class="bk-checks__label" for="{{ $id }}"></label>
            </li>
            @endforeach            
          </ul>
      
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
