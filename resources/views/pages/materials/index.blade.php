@extends('layouts.master')
<!-- material-index -->
@section('content')
<section id="material-index" class="bk-page section">
  <h2>Каталог цветов</h2>

  <div class="bk-materials">
    {{-- plates --}}
    <div class="bk-materials-section">
      <div class="bk-materials-header">
        <h5 class="bk-materials-header__title">ДСП</h5>
        <a 
          class="btn btn-sm btn-outline-primary" 
          href="{{ route('plates.create') }}" >
          Новая запись
        </a>
      </div>
      <hr>
      <ul class="bk-materials-list">
        @foreach($plates as $plate)
        <li class="bk-materials-list__item">
          <img 
            class="bk-materials-list__plate"
            src="{{asset('images/' . $plate->image)}}" 
            alt="{{ $plate->name }}" >
          <p class="bk-materials-list__info">{{ $plate->name }}</p>
          <div class="bk-materials-list__crud">
            <div 
                class="bk-btn bk-btn-crud btn btn-warning" 
                data-tip="Редактировать" >
              <a
                href="{{ route('plates.edit', $plate) }}"
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
                data-id="{{ $plate->id }}"
                data-table-name="plate"
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
    </div>
    {{-- fabrics --}}
    <div class="bk-materials-section">
      <div class="bk-materials-header">
        <h5 class="bk-materials-header__title">Обивочная ткань</h5>
        <a 
          class="btn btn-sm btn-outline-primary" 
          href="{{ route('fabrics.create') }}" >
          Новая запись
        </a>
      </div>
      <hr>
      <ul class="bk-materials-list">
        @foreach($fabrics as $fabric)
        <li class="bk-materials-list__item">
          <div 
            class="bk-materials-list__fabric" 
            style="background-color: {{ $fabric->code }}" ></div>
          <p class="bk-materials-list__info">{{ $fabric->name }}</p>
          <div class="bk-materials-list__crud">
            <div 
                class="bk-btn bk-btn-crud btn btn-warning" 
                data-tip="Редактировать" >
              <a
                href="{{ route('fabrics.edit', $fabric) }}"
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
                data-id="{{ $fabric->id }}"
                data-table-name="fabric"
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
    </div>
  </div>

  
 
</section>
@endsection
