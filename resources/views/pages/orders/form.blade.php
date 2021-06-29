@extends('layouts.master')
<!-- order-form -->
@section('content')
<section id="order-form" class="info-form section">
  <h5 class="bk-orders__title">
    Заказ №{{ $order->id }}
    <span class="bk-orders__title--date">
    от {{ getDMY($order->date_on) }}
    </span>
  </h5>

  <form
    class="bk-form"
    method="POST"
    action="{{ route('orders.update', $order) }}" >
    @csrf
    @method('PUT')

    <div class="bk-form__wrapper" data-info="Детали заказа">
      <div class="bk-form__block">

        <!-- /.customer->name -->
        <h6 class="bk-form__title">Заказчик</h6>
        <div class="bk-form__field-full mb-2">
          <p class="bk-orders__text">
            @if($order->customer->type_id == 1)
            {{ $order->customer->lastname . ' ' . $order->customer->firstname . ' ' . $order->customer->surname }}
            @else
            {{ $order->customer->name }}
            @endif
          </p>
        </div>

        <!-- /.customer->code -->
        <h6 class="bk-form__title">@if($order->customer->type_id == 1) ИИН @else БИН @endif</h6>
        <div class="bk-form__field-full mb-2">
          <p class="bk-orders__text">{{ $order->customer->code }}</p>
        </div>

        <!-- /.customer->address -->
        <h6 class="bk-form__title">Адрес</h6>
        <div class="bk-form__field-full mb-2">
          <p class="bk-orders__text">{{ $order->customer->address }}</p>
        </div>

        <!-- /.pay -->
        <h6 class="bk-form__title">Способ оплаты</h6>
        <div class="bk-form__field-full mb-2">
          <p class="bk-orders__text">
            @if($order->pay == 1)
            Предоплата
            <span class="bk-orders__value">50%</span>
            @elseif($order->pay == 2)
            Оплата
            <span class="bk-orders__value">100%</span>
            @endif
          </p>
        </div>

        <!-- /.products -->
        <h6 class="bk-form__title">Товары</h6>
        <div class="bk-form__field-full mb-2">
          <table class="bk-table table table-bordered table-responsive mb-0">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th class="w-100" style="min-width: 200px;">Наименование</th>
                <th class="text-center" style="min-width: 150px;">Кол-во</th>
                <th class="text-center" style="min-width: 150px;">Цена</th>
                <th class="text-center" style="min-width: 150px;">Сумма</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order->tops as $key => $top)
              <tr>
                <td>{{ $key+=1 }}</td>
                <td>
                  <div class="bk-btn-info">
                    <h6 class="my-1">
                      {{ $top->product->name }}
                    </h6>
                    <p class="bk-orders__info-item">
                      <span class="bk-orders__info-subtitle">Артикул:</span>
                      {{ $top->product->code }}
                      <small class="text-muted align-text-top">
                      {{ $top->color->name }}
                      </small>
                    </p>
                    <p class="bk-orders__info-item">
                      <span class="bk-orders__info-subtitle">Размер:</span>
                      {{ $top->product->L . 'x' . $top->product->B . 'x' . $top->product->H }}
                    </p>
                    <p class="bk-orders__info-item">
                      <span class="bk-orders__info-subtitle">Материал:</span>
                      {{ $top->product->material->name }}
                    </p>
                    <button
                      class="bk-btn-info__triangle bk-btn-info__triangle--down"
                      type="button"
                      title="Читать ещё">
                    </button>
                  </div>
                </td>
                <td class="text-center">{{ $top->pivot->count }} шт.</td>
                <td class="text-center">{{ number_format($top->product->price) }} ₽</td>
                <td class="text-center">{{ number_format($top->getPriceForCount()) }} ₽</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- /.customer->email -->

        <!-- /.pay -->
        <h6 class="bk-form__title">Сумма заказа</h6>
        <div class="bk-form__field-full mb-2">
          <p class="bk-orders__text font-weight-bold">{{ number_format($order->total) }} ₽</p>
        </div>

        <!-- /.depo -->
        <h6 class="bk-form__title">К оплате</h6>
        <div class="bk-form__field-full mb-2">
          <p class="bk-orders__text font-weight-bold @if($order->depo == 0) text-danger @else text-success @endif">
            @if($order->pay == 1)
            {{ calcDepo($order->total) }}
            @else
            {{ calcTotal($order->total) }}
            @endif
          </p>

          <div class="bk-orders__control">
            <input type="hidden" name="depo" value="0">
            <input
              class="form-control bk-form__check"
              id="depo"
              data-pay="{{ $order->pay }}"
              type="checkbox"
              name="depo"
              value="1"
              @if($order->depo) checked @endif />
            <label class="bk-form__label mb-0" for="depo">оплачено</label>
          </div>

          <div class="bk-orders__bill">
            <img
              class="bk-orders__bill-icon"
              src="{{ asset('icons/bill.svg') }}"
              alt="report" >
            <a
              class="bk-orders__bill-link"
              href="{{ route('orders.depo', $order) }}" >
              вывести счёт
            </a>
          </div>
        </div>

        <!-- /.debt -->
        @if($order->pay == 1)
        <div id="debt-block" class="d-none">
          <h6 class="bk-form__title">Долг</h6>
          <div class="bk-form__field-full mb-2">
            <p class="bk-orders__text font-weight-bold @if($order->debt == 0) text-danger @else text-success @endif">
              {{ calcDebt($order->total) }}
            </p>
  
            <div class="bk-orders__control">
              <input type="hidden" name="debt" value="0">
              <input
                class="form-control bk-form__check"
                id="debt"
                type="checkbox"
                name="debt"
                value="1"
                @if($order->debt) checked @endif />
              <label class="bk-form__label mb-0" for="debt">оплачено</label>
            </div>
  
            <div class="bk-orders__bill">
              <img
                class="bk-orders__bill-icon"
                src="{{ asset('icons/bill.svg') }}"
                alt="report" >
              <a
                class="bk-orders__bill-link"
                href="{{ route('orders.debt', $order) }}" >
                вывести счёт
              </a>
            </div>
          </div>
        </div>
        @endif

        <!-- /.date_on -->
        <input
          class="form-control bk-form__input d-none"
          id="date_on"
          type="date"
          name="date_on"
          value="{{ $order->date_on }}"
        >

        <!-- /.date_off -->
        <h6 class="bk-form__title">Дата готовности заказа</h6>
        <div class="bk-form__field-200 mb-2">
          <input
            class="form-control bk-form__input"
            id="date_off"
            type="date"
            name="date_off"
            value="{{ $order->date_off }}">
        </div>

        <!-- /.state -->
        <input
          class="form-control bk-form__input"
          id="state"
          type="hidden"
          name="state"
          value="{{ $order->state }}"
        >

        <!-- /.note -->
        <h6 class="bk-form__title">Примечание к заказу</h6>
        <div class="bk-form__field-full">
          <textarea class="form-control bk-form__text" name="note">{{ $order->note }}</textarea>
        </div>

      </div>
    </div>

    <div class="form-group">
      <button
        class="btn btn-outline-success"
        id="order-save"
        type="submit" >
        Сохранить
      </button>
      <a
        class="btn btn-outline-secondary"
        href="{{ route('orders.index') }}" >
        Назад
      </a>
    </div>
  </form>
</section>
@endsection
