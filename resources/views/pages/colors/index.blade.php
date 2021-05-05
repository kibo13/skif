@extends('layouts.master')
<!-- color-index -->
@section('content')
<section id="color-index" class="bk-page section">
  <h2 class="mb-3">Каталог цветов</h2>

  <div class="bk-group">
    <a class="btn btn-outline-primary" href="{{ route('colors.create') }}">
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('materials.index') }}">
      Вид древесины
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('fabrics.index') }}">
      Обивка
    </a>
  </div>

  <ul class="bk-gallery">
    @foreach($colors as $key => $color)
    <li class="bk-gallery__item">
      <img 
        class="bk-gallery__img"
        src="{{asset('images/' . $color->image)}}" 
        alt="{{ $color->name }}" >
      <p class="bk-gallery__info">{{ $color->name }}</p>
      <div class="bk-gallery__crud">
        <div 
            class="bk-btn bk-btn-crud btn btn-warning" 
            data-tip="Редактировать" >
          <a
            href="{{ route('colors.edit', $color) }}"
            class="bk-btn-wrap bk-btn-link" ></a>
          <span class="bk-btn-wrap bk-btn-icon">
            @include('assets.icons.pen')
          </span>
        </div>
        <div 
            class="bk-btn bk-btn-crud btn btn-danger" 
            data-tip="Удалить" >
          <a
            href="javascript:void(0)"
            class="bk-btn-wrap bk-btn-link bk-btn-del"
            data-id="{{ $color->id }}"
            data-table-name="color"
            data-toggle="modal"
            data-target="#bk-delete-modal" >
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
