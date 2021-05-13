@extends('layouts.master')
<!-- confirm-form -->
@section('content')
<section id="confirm-form" class="section">
  <h2 class="mb-3">Подтверждение заказа</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="">
      Новая запись
    </a>
  </div>

  <form
    class="bk-form"
    method="POST"
    action="" >
    @csrf

    <!-- /.customers -->
    <div class="bk-form__block">

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
                <ul class="bk-confirm-list">
                  <li class="bk-confirm-list__item">
                    <span class="bk-confirm-list__tip">Клиент:</span>
                    @if($customer->type_id == 1)
                    {{ $customer->lastname . ' ' . $customer->firstname . ' ' . $customer->surname }}
                    @else
                    {{ $customer->name }}
                    @endif
                  </li>
                  <li class="bk-confirm-list__item">
                    <span class="bk-confirm-list__tip">
                    @if($customer->type_id == 1)  ИИН: @else БИН: @endif
                    </span>
                    {{ $customer->code }}
                  </li>
                  <li class="bk-confirm-list__item">
                    <span class="bk-confirm-list__tip">Контакты:</span>
                    {{ $customer->address . ' / ' . $customer->phone }}
                  </li>
                </ul>
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
