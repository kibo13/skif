@extends('layouts.master')
<!-- purchase-index -->
@section('content')
<section id="purchase-index" class="bk-page section">
  <h2 class="mb-3">
    Ведомости на закупку материалов
  </h2>

  @if(Auth::user()->permissions()->pluck('slug')->contains('statement_full'))
  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('purchases.create') }}">
      Новая запись
    </a>
  </div>
  @endif

  <table
    id="purchase-table"
    class="bk-table table table-bordered table-hover table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25" style="min-width: 150px;">Ведомость</th>
        <th scope="col" class="w-25" style="min-width: 150px;">Дата</th>
        <th scope="col" class="w-25" style="min-width: 150px;">Исполнитель</th>
        <th scope="col" class="w-25 no-sort">Примечание</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($purchases as $key => $purchase)
      <tr>
        <td>{{ $key+=1 }}</td>
        <td>№{{ $purchase->code }}</td>
        <td>{{ getDMY($purchase->date_p) }}</td>
        <td>{{ $purchase->user->worker->fio }}</td>
        <td>{{ $purchase->note }}</td>
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--agree btn btn-primary"
              href="{{ route('purchases.list', $purchase) }}"
              data-tip="Ведомость" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--info btn btn-info"
              href="{{ route('purchases.show', $purchase) }}"
              data-tip="Информация" ></a>
            @if(Auth::user()->permissions()->pluck('slug')->contains('statement_full'))
            <a
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
              href="{{ route('purchases.edit', $purchase) }}"
              data-tip="Редактировать" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $purchase->id }}"
              data-table-name="purchase"
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
