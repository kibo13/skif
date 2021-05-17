@extends('layouts.master')
<!-- confirm-form -->
@section('content')
<section id="confirm-form" class="valid-form section" >
  <h2 class="mb-3">Подтверждение заказа</h2>

  <form
    method="POST"
    action="{{ route('home.orders.store', $order) }}" >
    @csrf
    @method('PUT')

    <!-- /.customer_id -->
    <div class="bk-form__wrapper px-2 pb-2" data-info="Контактные данные">
      <div class="bk-form__block bk-confirm-customer" >

        <a
          class="bk-confirm-customer__new btn btn-sm btn-primary"
          href="{{ route('customers.create') }}"
          title="Новый клиент" >
        </a>

        <table class="table table-bordered table-responsive">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col" class="w-100" style="min-width: 300px">
                Информация
              </th>
              <th scope="col">Выбрать</th>
            </tr>
          </thead>
          <tbody>
            @foreach($customers as $key => $customer)
            <tr>
              <td scope="row" style="min-width: 32px;">{{ $key+=1 }}</td>
              <td>
                <div class="bk-confirm-customer__info">
                  <h6 class="bk-confirm-customer__info-title" >
                    @if($customer->type_id == 1)
                    {{ $customer->lastname . ' ' . $customer->firstname . ' ' . $customer->surname }}
                    @else
                    {{ $customer->name }}
                    @endif
                  </h6>
                  <p class="bk-confirm-customer__info-text">
                    <span class="bk-confirm-customer__info-subtitle">
                      @if($customer->type_id == 1)  ИИН: @else БИН: @endif
                    </span>
                    {{ $customer->code }}
                    /
                    <span class="bk-confirm-customer__info-subtitle">
                      Тел:
                    </span>
                    {{ $customer->phone }}
                  </p>
                </div>
              </td>
              <td>
                <div class="bk-confirm-customer__control">
                  <input
                    class="bk-confirm-customer__control-radio"
                    id="{{ $customer->id }}"
                    type="radio"
                    value="{{ $customer->id }}"
                    name="customer_id" >
                  <label
                    class="bk-confirm-customer__control-label"
                    for="{{ $customer->id }}" >
                  </label>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <!-- /.ALERT HERE -->

      </div>
    </div>

    <!-- /.ship -->
    <div class="bk-form__wrapper px-2 pb-2 d-none" data-info="Способ доставки">
      <div class="bk-form__block bk-confirm-ship" >

        <div class="bk-confirm-ship__control">
          <input
            class="bk-confirm-ship__radio"
            id="ship1"
            type="radio"
            name="ship" >
          <label class="bk-confirm-ship__label" for="ship1">Доставка</label>
        </div>
        <div class="bk-confirm-ship__control">
          <input
            class="bk-confirm-ship__radio"
            id="ship2"
            type="radio"
            name="ship" >
          <label class="bk-confirm-ship__label" for="ship2">Самовывоз</label>
        </div>

      </div>
    </div>

    <!-- /.pay -->
    <div class="bk-form__wrapper px-2 pb-2 d-none" data-info="Способ оплаты">
      <div class="bk-form__block bk-confirm-pay" >

        <div class="bk-confirm-pay__control">
          <input
            class="bk-confirm-pay__radio"
            id="pay1"
            type="radio"
            name="pay" >
          <label class="bk-confirm-pay__label" for="pay1">Предоплата</label>
        </div>
        <div class="bk-confirm-pay__control">
          <input
            class="bk-confirm-pay__radio"
            id="pay2"
            type="radio"
            name="pay" >
          <label class="bk-confirm-pay__label" for="pay2">Оплата</label>
        </div>

      </div>
    </div>

    <!-- /.note -->
    <div class="bk-form__wrapper px-2 pb-2" data-info="Примечание к заказу">
      <div class="bk-form__block" >
        <textarea class="form-control bk-form__text" name="note"></textarea>
      </div>
    </div>

    <!-- /.note -->
    <input
      class="form-control bk-form__input mb-2"
      type="hidden"
      name="total"
      value="{{ $order->getFullPrice() }}" >

    <div class="bk-confirm-footer">
      <h5 class="bk-confirm-footer__total">
        <span class="bk-confirm-footer__total--sm">Итого:</span>
        {{ number_format($order->getFullPrice()) }} ₽
      </h5>
      <div class="bk-confirm-footer__control">
        <a
          class="btn btn-outline-secondary"
          href="{{ route('home.basket.index') }}" >
          Назад
        </a>
        <button
          class="btn btn-outline-success"
          id="confirm-save"
          type="submit" >
          Подтвердить заказ
        </button>
      </div>
    </div>

  </form>
</section>
@endsection
