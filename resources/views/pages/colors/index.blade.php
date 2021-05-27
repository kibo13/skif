@extends('layouts.master')
<!-- color-index -->
@section('content')
<section id="color-index" class="bk-page section">
  <h2>Каталог цветов</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('colors.create') }}">
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('materials.index') }}" >
      Материалы
    </a>
  </div>

  <ul class="bk-colors">
    @foreach($colors as $color)
    <li class="bk-colors__item">
      <img
        class="bk-colors__img"
        src="{{asset('images/' . $color->image)}}"
        alt="{{ $color->name }}" >
      <p class="bk-colors__info">{{ $color->name }}</p>
      <div class="bk-colors__crud bk-btn-actions">
        <a
            class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
            href="{{ route('colors.edit', $color) }}"
            data-tip="Редактировать" ></a>
        <a
          class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
          href="javascript:void(0)"
          data-id="{{ $color->id }}"
          data-table-name="color"
          data-toggle="modal"
          data-target="#bk-delete-modal"
          data-tip="Удалить" ></a>
      </div>
    </li>
    @endforeach
  </ul>



</section>
@endsection
