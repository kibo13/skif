@extends('layouts.master')
<!-- material-index -->
@section('content')
<section id="material-index" class="bk-page section">
  <h2 class="mb-3">Материалы</h2>

  <div class="bk-group">
    <a class="btn btn-outline-primary" href="{{ route('materials.create') }}">
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('trees.index') }}">
      Вид древесины
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('colors.index') }}">
      Каталог цветов
    </a>
  </div>

  <div class="bk-display">
    @foreach($materials as $material)
    <div class="bk-display__header">
      <div class="bk-display__title">
        {{ $material->tree->name }}
        <small class="text-muted align-text-top">
          <td>{{ number_format($material->price, 2) }}</td>
        </small>
      </div>
      <div class="bk-display__control">
        <div 
            class="bk-btn bk-btn-crud btn btn-warning" 
            data-tip="Редактировать"
          >
            <a
                href="{{ route('materials.edit', $material) }}"
                class="bk-btn-wrap bk-btn-link"
              ></a>
            <span class="bk-btn-wrap bk-btn-icon">
              @include('assets.icons.pen')
            </span>
        </div>
        <div 
            class="bk-btn bk-btn-crud btn btn-danger" 
            data-tip="Удалить"
          >
          <a
              href="javascript:void(0)"
              class="bk-btn-wrap bk-btn-link bk-btn-del"
              data-id="{{ $material->id }}"
              data-table-name="material"
              data-toggle="modal"
              data-target="#bk-delete-modal"
            >
          </a>
          <span class="bk-btn-wrap bk-btn-icon">
            @include('assets.icons.trash')
          </span>
        </div>
      </div>
    </div>
    <hr>
    <ul class="bk-display__body">
      @foreach($material->colors as $color)
      <li class="colors__item">
        <img 
          class="colors__img"
          src="{{asset('images/' . $color->image)}}" 
          alt="{{ $color->name }}">
        <p class="colors__title">
          {{ $color->name }}
        </p>
      </li>
      @endforeach
    </ul>
    @endforeach
  </div>
 
</section>
@endsection
