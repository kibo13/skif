@extends('layouts.master')
<!-- order-index -->
@section('content')
<section id="order-index" class="bk-page section">
  <h2 class="mb-3">Заказы</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="">
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
        <th scope="col" class="w-25">Номер</th>
        <th scope="col" class="w-25">Сумма</th>
        <th scope="col" class="w-25">Статус</th>
        <th scope="col" class="w-25 no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $key => $order)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td scope="row">{{ $order->id }}</td>
        <td scope="row">{{ $order->getFullPrice() }} ₽</td>
        <td scope="row">
        @if($order->state == 0) В корзине @endif
        @if($order->state == 1) Оформлен @endif
        @if($order->state == 2) Готов @endif
        </td>
        <td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
