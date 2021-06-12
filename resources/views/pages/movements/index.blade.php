@extends('layouts.master')
<!-- movement-index -->
@section('content')
<section id="movement-index" class="bk-page section">
  <h2 class="mb-3">
    Учёт материалов
  </h2>

  <div class="bk-btn-group">
    @if(Auth::user()->permissions()->pluck('slug')->contains('store_full'))
    <a class="btn btn-outline-primary" href="{{ route('movements.create') }}">
      Новая запись
    </a>
    @endif
    <a class="btn btn-outline-secondary" href="{{ route('movements.rests') }}">
      Остатки
    </a>
  </div>

  <table
    id="movement-table"
    class="bk-table table table-bordered table-hover table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25" style="min-width: 100px;">Вид</th>
        <th scope="col" class="w-25" style="min-width: 150px;">Накладная</th>
        <th scope="col" class="w-25" style="min-width: 100px;">Дата</th>
        <th scope="col" class="w-25 no-sort">Примечание</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($movements as $key => $movement)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          @if($movement->tot == 1)
          <span class="text-success font-weight-bold">
            Приход
          </span>
          @else
          <span class="text-danger font-weight-bold">
            Расход
          </span>
          @endif
        </td>
        <td>№{{ $movement->code }}</td>
        <td>{{ getDMY($movement->date_move) }}</td>
        <td>{{ $movement->note }}</td>
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--agree btn btn-primary"
              href="{{ route('movements.bill', $movement) }}"
              data-tip="Накладная" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--info btn btn-info"
              href="{{ route('movements.moms', $movement) }}" 
              data-tip="Информация" ></a>
            @if(Auth::user()->permissions()->pluck('slug')->contains('store_full'))
            <a
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
              href="{{ route('movements.edit', $movement) }}"
              data-tip="Редактировать" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $movement->id }}"
              data-table-name="movement"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="Удалить" ></a>
            @endif
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
