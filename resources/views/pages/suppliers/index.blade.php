@extends('layouts.master')
<!-- supplier-index -->
@section('content')
<section id="supplier-index" class="bk-page info-form section">
  <h2 class="mb-3">Поставщики</h2>

  @if(Auth::user()->permissions()->pluck('slug')->contains('sup_full'))
  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('suppliers.create') }}" >
      Новая запись
    </a>
  </div>
  @endif

  <table
      id="supplier-table"
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25" style="min-width: 120px;">Организация</th>
        <th scope="col" class="w-25" style="min-width: 120px;">БИН</th>
        <th scope="col" class="w-25" style="min-width: 150px;">Директор</th>
        <th scope="col" class="w-25 no-sort" style="min-width: 300px;">Адрес</th>
        @if(Auth::user()->permissions()->pluck('slug')->contains('sup_full'))
        <th scope="col" class="no-sort">Действие</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($suppliers as $key => $supplier)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>{{ $supplier->name }}</td>
        <td>{{ $supplier->code }}</td>
        <td>
          <div title="{{ $supplier->lastname . ' ' . $supplier->firstname . ' ' . $supplier->surname}}">
            {{ $supplier->fio }}
          </div>
        </td>
        <td>
          <div class="bk-btn-info">
            {{ $supplier->index }}, г.{{ $supplier->city }}, 
            ул.{{ $supplier->address }}<br>
            @if($supplier->phone != null) 
              Тел: {{ $supplier->phone }}<br>
            @endif
            @if($supplier->email != null) 
              Почта: {{ $supplier->email }}<br>
            @endif
            <button 
              class="bk-btn-info__triangle bk-btn-info__triangle--down" 
              title="Читать ещё">
            </button>
          </div>
        </td>
        @if(Auth::user()->permissions()->pluck('slug')->contains('sup_full'))
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
              href="{{ route('suppliers.edit', $supplier) }}"
              data-tip="Редактировать" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $supplier->id }}"
              data-table-name="supplier"
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
</section>
@endsection
