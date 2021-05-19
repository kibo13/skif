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

    <!-- /.code -->
    <input
      class="form-control bk-form__input mb-2"
      type="hidden"
      name="code"
      value="{{ getCode() }}"
    >

    <!-- /.date_on -->
    <input
      class="form-control bk-form__input mb-2"
      type="hidden"
      name="date_on"
      value="{{ getCurrentDay() }}"
    >

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

      </div>
    </div>

    <!-- /.worker_id -->
    <input
      class="form-control bk-form__input mb-2"
      type="hidden"
      name="worker_id"
      value="{{ Auth::user()->worker->id }}"
    >

    <!-- /.pay -->
    <div class="bk-form__wrapper px-2 pb-2" data-info="Способ оплаты">
      <div class="bk-form__block bk-confirm-pay" >

        <div class="bk-confirm-pay__control">
          <input
            class="bk-confirm-pay__radio"
            id="pay1"
            type="radio"
            name="pay"
            value="1" >
          <label class="bk-confirm-pay__label" for="pay1">
            Предоплата
            <span class="bk-confirm-pay__label--value">50%</span>
          </label>
        </div>

        <div class="bk-confirm-pay__control">
          <input
            class="bk-confirm-pay__radio"
            id="pay2"
            type="radio"
            name="pay"
            value="2" >
          <label class="bk-confirm-pay__label" for="pay2">
            Оплата
            <span class="bk-confirm-pay__label--value">100%</span>
          </label>
        </div>

      </div>
    </div>

    <!-- /.depo -->
    <input
      class="form-control bk-form__input mb-2"
      id="depo"
      type="hidden"
      name="depo"
      value=""
      placeholder="depo"
    >

    <!-- /.debt -->
    <input
      class="form-control bk-form__input mb-2"
      id="debt"
      type="hidden"
      name="debt"
      value=""
      placeholder="debt"
    >

    <!-- /.total -->
    <input
      class="form-control bk-form__input mb-2"
      id="total"
      type="hidden"
      name="total"
      value="{{ $order->getFullPrice() }}"
      placeholder="total"
    >

    <!-- /.state -->
    <input
      class="form-control bk-form__input mb-2"
      type="hidden"
      name="state"
      value="1"
    >

    <!-- /.note -->
    <div class="bk-form__wrapper px-2 pb-2" data-info="Примечание к заказу">
      <div class="bk-form__block" >
        <textarea class="form-control bk-form__text" name="note"></textarea>
      </div>
    </div>

    <div class="bk-confirm-footer">
      <div class="bk-confirm-footer__cost">
        <h5 class="bk-confirm-footer__cost-text">
          Итого:
          <span class="bk-confirm-footer__cost-value">
            {{ $order->getFullPrice() }} ₽
          </span>
        </h5>
        <div id="cost" class="d-none">
          <hr>
          <h5 class="bk-confirm-footer__cost-text">
            Сумма к оплате:
            <span id="cost-depo" class="bk-confirm-footer__cost-value"></span>
          </h5>
          <h5 id="cost-wrapper-debt" class="bk-confirm-footer__cost-text">
            Остаток:
            <span id="cost-debt" class="bk-confirm-footer__cost-value"></span>
          </h5>
        </div>
      </div>
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
