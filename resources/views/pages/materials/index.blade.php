@extends('layouts.master')
<!-- material-index -->
@section('content')
<section id="material-index" class="bk-page section">
  <h2 class="mb-3">Каталог цветов</h2>

  <div class="bk-group">
    <a class="btn btn-outline-primary" href="{{ route('materials.create') }}">
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('fabrics.index') }}">
      Обивка
    </a>
  </div>

  <ul class="bk-gallery">
    @foreach($materials as $key => $material)
    <li class="bk-gallery__item">
      <img 
        class="bk-gallery__img"
        src="{{asset('images/' . $material->image)}}" 
        alt="{{ $material->name }}">
      <p class="bk-gallery__info bk-gallery__info--title">
        {{ $material->name }}
      </p>
      <p class="bk-gallery__info bk-gallery__info--price">
        <td>{{ number_format($material->price) }} ₽</td>
      </p>
      <div class="bk-gallery__crud">
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
    </li>
    @endforeach
  </ul>
 
</section>
@endsection
