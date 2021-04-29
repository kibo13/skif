@extends('layouts.master')
<!-- order-index -->
@section('content')
<section id="order-index" class="bk-page section">
  <h2 class="mb-3">Заказы</h2>

  <div class="bk-group">
    <a class="btn btn-outline-primary" href="{{ route('orders.create') }}">
      Новая запись
    </a>
  </div>

  <table
      id="order-table"
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-50">Номер заказа</th>
        <th scope="col" class="w-25">Дата</th>
        <th scope="col" class="w-25 no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
  </table>
</section>
@endsection
