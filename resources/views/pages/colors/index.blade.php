@extends('layouts.master')
<!-- color-index -->
@section('content')
<section id="color-index" class="bk-page section">
  <h2>Каталог цветов</h2>

  <div class="bk-colors">
    {{-- plates --}}
    <div class="bk-colors-section">
      <div class="bk-colors-header">
        <h5 class="bk-colors-header__title">ЛДСП</h5>
        <a 
          class="btn btn-sm btn-outline-primary" 
          href="{{ route('plates.create') }}" >
          Новая запись
        </a>
      </div>
      <hr>
      <ul class="bk-colors-list">
        @foreach($plates as $plate)
        <li class="bk-colors-list__item">
          <img 
            class="bk-colors-list__plate"
            src="{{asset('images/' . $plate->image)}}" 
            alt="{{ $plate->name }}" >
          <p class="bk-colors-list__info">{{ $plate->name }}</p>
          <div class="bk-colors-list__crud bk-btn-actions">
            <a 
                class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
                href="{{ route('plates.edit', $plate) }}"
                data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $plate->id }}"
              data-table-name="plate"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="Удалить" ></a>
          </div>
        </li>
        @endforeach
      </ul> 
    </div>
    {{-- fabrics --}}
    <div class="bk-colors-section">
      <div class="bk-colors-header">
        <h5 class="bk-colors-header__title">Обивочная ткань</h5>
        <a 
          class="btn btn-sm btn-outline-primary" 
          href="{{ route('fabrics.create') }}" >
          Новая запись
        </a>
      </div>
      <hr>
      <ul class="bk-colors-list">
        @foreach($fabrics as $fabric)
        <li class="bk-colors-list__item">
          <div 
            class="bk-colors-list__fabric" 
            style="background-color: {{ $fabric->code }}" ></div>
          <p class="bk-colors-list__info">{{ $fabric->name }}</p>
          <div class="bk-colors-list__crud bk-btn-actions">
            <a 
                class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
                href="{{ route('fabrics.edit', $fabric) }}"
                data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $fabric->id }}"
              data-table-name="fabric"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="Удалить" ></a>
          </div>
        </li>
        @endforeach
      </ul>      
    </div>
  </div>

  
 
</section>
@endsection
