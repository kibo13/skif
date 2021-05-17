@extends('layouts.master')
<!-- order-index -->
@section('content')
<section id="order-index" class="bk-page section">
  <h2 class="mb-3">Заказы</h2>

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
        - оформленных 
        <span class="bk-inspect-value">
          {{ $total }}
        </span>
      </li>
      <li class="bk-inspect-list__item">
        - в процессе 
        <span class="bk-inspect-value">
          {{ $total }}
        </span>
      </li>
      <li class="bk-inspect-list__item">
        - готовых 
        <span class="bk-inspect-value">
          {{ $total }}
        </span>
      </li>
    </ul>
  </div>
  @endif

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
        <td>{{ $key+=1 }}</td>
        <td>{{ $order->code }}</td>
        <td>{{ number_format($order->total) }} ₽</td>
        <td>
        @if($order->state == 1) Оформлен @endif
        @if($order->state == 2) Готов @endif
        </td>
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href=""
              data-tip="Редактировать" ></a>
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
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
