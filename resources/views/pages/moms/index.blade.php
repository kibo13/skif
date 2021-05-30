@extends('layouts.master')
<!-- mom-index -->
@section('content')
<section id="mom-index" class="section">
  <h2 class="mb-3">Перечень материалов</h2>

  <div class="bk-btn-group">
    <a 
      class="btn btn-outline-primary" 
      href="{{ route('movements.moms.create', $movement) }}" >
      Новая запись
    </a>
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
        <th scope="col" class="w-25" style="min-width: 200px;">Наименование</th>
        <th scope="col" class="w-25">Кол-во</th>
        <th scope="col" class="w-25">Цена</th>
        <th scope="col" class="w-25">Сумма</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($moms as $key => $mom)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td scope="row">
          {{ $mom->material->name }}
          <span class="bk-small">
            {{ $mom->color->name }}
          </span>
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
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</section>
@endsection
