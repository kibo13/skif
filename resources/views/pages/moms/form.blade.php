@extends('layouts.master')
<!-- mom-form -->
@section('content')
<section id="mom-form" class="valid-form section">
  <h2 class="mb-3">
    @isset($mom) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    @isset($mom)
      action="{{ route('movements.moms.update', ['movement' => $movement, 'mom' => $mom]) }}"
    @else
      action="{{ route('movements.moms.store', $movement) }}"
    @endisset >
    @csrf

    <div>
      @isset($mom) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

        <!-- /.movement -->
        <h6 class="bk-form__title">
          @if($movement->tot == 1)
          Приходная накладная
          @else
          Расходная накладная
          @endif
        </h6>
        <div class="bk-form__field-full mb-2">
          <p class="bk-moms__text">
            №{{ $movement->code }} 
            <span class="bk-small">
            от {{ getDMY($movement->date_move) }}
            </span> 
          </p>
        </div>

        <!-- /.movement_id -->
        <input 
          class="form-control bk-form__input mb-2"
          type="hidden" 
          name="movement_id" 
          value="{{ $movement->id }}" 
        >

        <!-- /.material_id -->
        <h6 class="bk-form__title">Материал</h6>
        <div class="bk-form__field-250 mb-2">
          <select
            class="form-control bk-form__input"
            id="mom-material"
            name="material_id">
            <option disabled selected>Выберите материал</option>
            @foreach($materials as $material)
            <option
              value="{{ $material->id }}"
              data-tom="{{ $material->tom }}"
              @isset($mom)
                @if($mom->material_id == $material->id)
                  selected
                @endif
              @endisset >
              @if($material->tom == 1) 
              {{ ucfirst($material->name) }}
              {{ $material->L . 'x' . $material->B . 'x' . $material->H}}
              @else 
              {{ ucfirst($material->name) }}
              @endif 
            </option>
            @endforeach
          </select>
        </div>

        <!-- /.color_id -->
        <div id="mom-color" class="d-none">
          <h6 class="bk-form__title">Цвет материала</h6>
          @foreach($materials as $material)
          <div 
            class="bk-form__field-full mb-2 d-none js-mc"
            data-id="{{ $material->id }}">
            <ul class="bk-checks">
              @foreach($material->colors as $id => $color)
              <li class="bk-checks__item" title="{{ $color->name }}">
                <img 
                  class="bk-checks__img" 
                  src="{{asset('images/' . $color->image)}}" 
                  alt="{{ $color->name }}" >
                <input 
                  class="bk-checks__checkbox" 
                  id="{{ $material->name . $id }}" 
                  type="radio"
                  name="color_id"
                  value="{{ $color->id }}"
                  @isset($mom) 
                    @if($mom->color_id == $color->id)
                      checked
                    @endif
                  @endisset >
                <label class="bk-checks__label" for="{{ $material->name . $id }}"></label>
              </li>
              @endforeach                 
            </ul>
          </div>    
          @endforeach    
        </div>

        <!-- /.price -->
        <h6 class="bk-form__title">Цена</h6>
        <div class="bk-form__field-100 mb-2">
          <input
            class="form-control bk-form__input bk-valid"
            id="price"
            type="text"
            name="price"
            value="@isset($mom) {{ $mom->price }} @endisset"
            placeholder="1 250"
            maxlength="5"
            required
          />
        </div>

        <!-- /.count -->
        <h6 class="bk-form__title">Количество</h6>
        <div class="bk-form__field-100">
          <input
            class="form-control bk-form__input bk-valid"
            id="count"
            type="text"
            name="count"
            value="@isset($mom) {{ $mom->count }} @endisset"
            placeholder="1"
            maxlength="3"
            required
          />
        </div>

        </div>
      </div>

      <div class="form-group">
        <button 
          class="btn btn-outline-success" 
          id="mom-save"
          type="submit" >
          Сохранить
        </button>
        <a 
          class="btn btn-outline-secondary" 
          href="{{ route('movements.moms', $movement) }}" >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
