@extends('layouts.master')
<!-- confirm-form -->
@section('content')
<section id="confirm-form" class="valid-form section">
  <h2 class="mb-3">Подтверждение заказа</h2>

  <div class="bk-confirm-header">
    <h5 class="bk-confirm-header__title">
      Клиентская база
    </h5>
    <a 
      class="bk-confirm-header__btn btn btn-sm btn-primary" 
      href="{{ route('customers.create') }}"
      title="Новый клиент" ></a>
  </div>

  <form
    method="POST"
    action="" >
    @csrf

    <div class="bk-form__block">

      <!-- /.customers -->
      <div class="bk-form__field-full bk-confirm-customer">
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
                <div class="bk-confirm-info">
                  <h6 class="bk-confirm-info__title" >
                    @if($customer->type_id == 1)
                    {{ $customer->lastname . ' ' . $customer->firstname . ' ' . $customer->surname }}
                    @else
                    {{ $customer->name }}
                    @endif
                  </h6>
                  <p class="bk-confirm-info__text">
                    <span class="bk-confirm-info__subtitle">
                      @if($customer->type_id == 1)  ИИН: @else БИН: @endif
                    </span>
                    {{ $customer->code }}
                    /
                    <span class="bk-confirm-info__subtitle">Тел:</span>
                    {{ $customer->phone }}
                  </p>
                </div>
              </td>
              <td>
                <div class="bk-confirm-control">
                  <input
                    class="bk-confirm-control__radio"
                    id="{{ $customer->id }}"
                    type="radio"
                    value="{{ $customer->id }}"
                    name="customer_id" >
                  <label
                    class="bk-confirm-control__label"
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



  </form>











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
</section>
@endsection