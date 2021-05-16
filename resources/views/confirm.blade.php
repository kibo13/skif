@extends('layouts.master')
<!-- confirm-form -->
@section('content')
<section id="confirm-form" class="valid-form section" >
  <h2 class="mb-3">Подтверждение заказа</h2> 

  <form
    method="POST"
    action="" >
    @csrf

    {{-- @isset($order)
      @method('PUT')
    @endisset --}}

    <!-- /.order -->

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

    <div class="bk-form__wrapper px-2 pb-2" data-info="Примечание к заказу">
      <div class="bk-form__block" >
        <textarea class="form-control" name="note"></textarea>
      </div>
    </div>




    <div class="form-group">
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

  </form>

</section>
@endsection
