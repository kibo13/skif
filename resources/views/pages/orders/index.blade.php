@extends('layouts.master')
<!-- order-index -->
@section('content')
<section id="order-index" class="bk-page section">
  <h2 class="mb-3">Заказы</h2>

  {{-- control --}}
  @if($total != 0)
  <div class="bk-inspect">
    <div class="bk-inspect-top">
      <h5 class="bk-inspect-top__title">
        Контроль заказов
        <span class="bk-inspect-value">
          {{ getToday() }}
        </span>
      </h5>
      <p class="bk-inspect-top__text">
        Общее количество заказов:
        <span class="bk-inspect-value">
          {{ $total }}
        </span>
        <span class="bk-inspect-toggler bk-inspect-toggler--hide"></span>
      </p>
    </div>
    <ul class="bk-inspect-list d-none">
      <li class="bk-inspect-list__subtitle">Количество заказов:</li>
      <li class="bk-inspect-list__item">
        - в обработке
        <span class="bk-inspect-value">
          {{ $progress }}
        </span>
      </li>
      <li class="bk-inspect-list__item">
        - выполненных
        <span class="bk-inspect-value">
          {{ $complete }}
        </span>
      </li>
    </ul>
  </div>
  @endif

  {{-- alert --}}
  @if(session()->has('warning'))
  <div class="alert alert-warning" role="alert">
    {{ session()->get('warning') }}
  </div>
  @elseif(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
  </div>
  @endif

  {{-- table --}}
  <table
      id="order-table"
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25" style="min-width: 300px;">Информация</th>
        <th scope="col" class="w-25" style="min-width: 150px;">Заказчик</th>
        <th scope="col" class="w-25" style="min-width: 150px;">Исполнитель</th>
        <th scope="col" class="w-25" style="min-width: 150px;">Статус</th>
        @if(Auth::user()->permissions()->pluck('slug')->contains('order_full'))
        <th scope="col" class="no-sort">Действие</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $key => $order)
      <tr>
        <td>{{ $key+=1 }}</td>
        <td>
          <h6 class="my-1">
            Заказ №{{ $order->id }}
            <span class="bk-small">{{ getDMY($order->date_on) }}</span>
          </h6>
          <p class="bk-orders__info-item">
            <span class="bk-orders__info-subtitle">Способ оплаты:</span>
            @if($order->pay == 1) предоплата @endif
            @if($order->pay == 2) оплата @endif
          </p>
          <p class="bk-orders__info-item">
            <span class="bk-orders__info-subtitle">Сумма заказа:</span>
            {{ calcTotal($order->total) }}
          </p>
          {{-- <p class="bk-orders__info-item">
            <span class="bk-orders__info-subtitle">Срок исполнения:</span>
            2 недели
          </p> --}}
          <hr class="bk-orders__line">
          <p class="bk-orders__info-item">
          @if($order->pay == 1) 
            <span class="bk-orders__info-subtitle">Предоплата:</span>
            @if($order->depo == 0) 
            <span class="text-danger">{{ calcDepo($order->total) }}</span>
            @else 
            <span class="text-success">{{ calcDepo($order->total) }}</span>
            @endif
          @elseif($order->pay == 2)
            <span class="bk-orders__info-subtitle">Оплата:</span>
            @if($order->depo == 0) 
            <span class="text-danger">{{ calcTotal($order->total) }}</span>
            @else 
            <span class="text-success">{{ calcTotal($order->total) }}</span>
            @endif
          @endif
          </p>
          @if($order->pay == 1)
          <p class="bk-orders__info-item">
            <span class="bk-orders__info-subtitle">Долг:</span>
            @if($order->debt == 0) 
            <span class="text-danger">{{ calcDebt($order->total) }}</span>
            @else 
            <span class="text-success">{{ calcDebt($order->total) }}</span>
            @endif
          </p>    
          @endif 
        </td>
        <td>
          @if($order->customer->type_id == 1) 
            <div title="{{ $order->customer->lastname . ' ' . $order->customer->firstname . ' ' . $order->customer->surname}}">
              {{ getFIO($order->customer->lastname, $order->customer->firstname, $order->customer->surname) }}
              <span class="bk-small">ФЛ</span>
            </div>
          @else
            {{ $order->customer->name }}
            <span class="bk-small">ЮЛ</span>
          @endif 
        </td>
        <td>
          <div title="{{ $order->worker->lastname . ' ' . $order->worker->firstname . ' ' . $order->worker->surname}}">
            {{ $order->worker->fio }}
          </div>
        </td>
        <td>
          @if($order->state == 1)
          <span class="text-danger font-weight-bold">В обработке</span>
          @elseif($order->state == 2)
          <span class="text-success font-weight-bold">
          Готов <span class="bk-small">{{ getDMY($order->date_off) }}</span>
          </span>
          @endif
        </td>
        @if(Auth::user()->permissions()->pluck('slug')->contains('order_full'))
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--agree btn btn-primary"
              href="{{ route('orders.term', $order) }}"
              data-tip="Договор" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--info btn btn-info"
              href="{{ route('orders.details', $order) }}"
              data-tip="Информация" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--alarm btn btn-success"
              href="javascript:void(0)"
              data-id="{{ $order->id }}"
              data-table-name="order"
              data-toggle="modal"
              data-target="#bk-alert-modal"
              data-tip="Уведомить" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $order->id }}"
              data-table-name="order"
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
