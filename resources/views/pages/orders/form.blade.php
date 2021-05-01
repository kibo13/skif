@extends('layouts.master')
<!-- order-form -->
@section('content')
<section id="order-form" class="valid-form section">
  <h2 class="mb-3">
    @isset($order) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    enctype="multipart/form-data"
    @isset($order)
      action="{{ route('orders.update', $order) }}"
    @else
      action="{{ route('orders.store') }}"
    @endisset
  >
    @csrf
    <div>
      @isset($order) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.customers -->
          <h6 class="bk-form__title">Клиентская база</h6>
          <div class="bk-form__field-full mb-2 order-customer">
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
                @isset($order) 
                <tr>
                  <td scope="row" style="min-width: 32px;">1</td>
                  <td>
                    <ul class="order-list">
                      <li class="order-list__item">
                        <span class="order-list__tip">Клиент:</span>
                        @if($order->customer->type_id == 1) 
                        {{ $order->customer->lastname . ' ' . $order->customer->firstname . ' ' . $order->customer->surname }}
                        @else
                        {{ $order->customer->name }}
                        @endif 
                      </li>
                      <li class="order-list__item">
                        <span class="order-list__tip">
                        @if($order->customer->type_id == 1)  ИИН: @else БИН: @endif 
                        </span>
                        {{ $order->customer->code }}
                      </li>
                      <li class="order-list__item">
                        <span class="order-list__tip">Контакты:</span>
                        {{ $order->customer->address . ' / ' . $order->customer->phone }}
                      </li>
                    </ul>
                  </td>
                  <td>
                    <div class="order-control">
                      <input 
                        class="order-control__radio"
                        id="{{ $order->id }}"
                        type="radio" 
                        value="{{ $order->customer_id }}"
                        checked
                        name="customer_id" >
                      <label 
                        class="order-control__label" 
                        for="{{ $order->id }}" >
                      </label>
                    </div>
                  </td>
                </tr>
                @else 
                @foreach($customers as $key => $customer)
                <tr>
                  <td scope="row" style="min-width: 32px;">{{ $key+=1 }}</td>
                  <td>
                    <ul class="order-list">
                      <li class="order-list__item">
                        <span class="order-list__tip">Клиент:</span>
                        @if($customer->type_id == 1) 
                        {{ $customer->lastname . ' ' . $customer->firstname . ' ' . $customer->surname }}
                        @else
                        {{ $customer->name }}
                        @endif 
                      </li>
                      <li class="order-list__item">
                        <span class="order-list__tip">
                        @if($customer->type_id == 1)  ИИН: @else БИН: @endif 
                        </span>
                        {{ $customer->code }}
                      </li>
                      <li class="order-list__item">
                        <span class="order-list__tip">Контакты:</span>
                        {{ $customer->address . ' / ' . $customer->phone }}
                      </li>
                    </ul>
                  </td>
                  <td>
                    <div class="order-control">
                      <input 
                        class="order-control__radio"
                        id="{{ $customer->id }}"
                        type="radio" 
                        value="{{ $customer->id }}"
                        name="customer_id" >
                      <label 
                        class="order-control__label" 
                        for="{{ $customer->id }}" >
                      </label>
                    </div>
                  </td>
                </tr>
                @endforeach
                @endisset
              </tbody>
            </table>

            <span class="alert alert-danger order-alert d-none" role="alert">
              <strong>Необходимо выбрать клиента</strong>
            </span>
          </div>

          <!-- /.customers -->
          <h6 class="bk-form__title">Мебель</h6>
  
          
        </div>
      </div>

      <div class="form-group">
        <button 
          class="btn btn-outline-success" 
          id="order-save" 
          type="submit">Сохранить</button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('orders.index') }}" >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
