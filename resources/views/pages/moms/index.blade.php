@extends('layouts.master')
<!-- mom-index -->
@section('content')
<section id="mom-index" class="section">
  <h2 class="mb-3">Перечень материалов</h2>

  <div class="bk-btn-group">
    @if(Auth::user()->permissions()->pluck('slug')->contains('store_full'))
    <a 
      class="btn btn-outline-primary" 
      href="{{ route('movements.moms.create', $movement) }}" >
      Новая запись
    </a>
    @endif
    <a class="btn btn-outline-secondary" href="{{ route('movements.index') }}" >
      Назад
    </a>
  </div>

  @if(count($moms) == 0)
  <h5>Записи отсутствуют</h5>
  @else 
  <table 
      id="mom-table" 
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" style="min-width: 200px;">Наименование</th>
        <th scope="col" style="min-width: 100px;">Цвет</th>
        <th scope="col" class="w-25">Ед.изм.</th>
        <th scope="col" class="w-25">Кол-во</th>
        <th scope="col" class="w-25">Цена</th>
        <th scope="col" class="w-25">Сумма</th>
        @if(Auth::user()->permissions()->pluck('slug')->contains('store_full'))
        <th scope="col" class="no-sort">Действие</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($moms as $key => $mom)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td scope="row">
          {{ $mom->material->name }}
          @if($mom->material->L != null || $mom->material->B != null || $mom->material->H != null)
          <span class="bk-small">
            {{ $mom->material->L . 'x' . $mom->material->B . 'x' . $mom->material->H}}
          </span>
          @endif 
        </td>
        <td scope="row">
          @if($mom->color_id != null)
          <img 
            class="bk-rests-color"
            src="{{asset('images/' . $mom->color->image)}}" 
            alt ="{{ $mom->color->name }}"
            title="{{ $mom->color->name }}" >
          @else 
          -
          @endif 
        </td>
        <td scope="row">
          {{ $mom->material->measure }}
        </td>
        <td scope="row">
          {{ $mom->count }}
        </td>
        <td scope="row">
          {{ calcTotal($mom->price) }}
        </td>
        <td scope="row">
          {{ calcTotal($mom->getPriceForCount()) }}
        </td>
        @if(Auth::user()->permissions()->pluck('slug')->contains('store_full'))
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href="{{ route('movements.moms.edit', ['movement' => $movement, 'mom' => $mom]) }}"
              data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $mom->id }}"
              data-product="{{ $movement->id }}"
              data-table-name="mom"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="Удалить" ></a>
          </div>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</section>
@endsection
