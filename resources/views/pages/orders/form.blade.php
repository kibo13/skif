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

          <!-- /.types of customers -->
          <h6 class="bk-form__title">Тип клиента</h6>
          <div class="bk-form__field-250 mb-2">
            <select 
              class="form-control bk-form__input"
              id="types"
              name="types" >
              <option disabled selected>Выберите тип</option>
              @foreach($types as $type)
              <option 
                value="{{ $type['id'] }}" 
                @isset($order) 
                  @if($order->customer->type_id == $type['id'])
                    selected
                  @endif
                @endisset >
                {{ $type['name'] }}
              </option>
              @endforeach
            </select>
          </div>

          <!-- /.customers -->
          <h6 class="bk-form__title">Клиент</h6>
          <div class="bk-form__field-250 mb-2">
            <select 
              class="form-control bk-form__input"
              id="types"
              name="types" >
              <option disabled selected>Выберите тип</option>
              @foreach($types as $type)
              <option 
                value="{{ $type['id'] }}" 
                @isset($order) 
                  @if($order->customer->type_id == $type['id'])
                    selected
                  @endif
                @endisset >
                {{ $type['name'] }}
              </option>
              @endforeach
            </select>
          </div>
          

          
        </div>
      </div>

      <div class="form-group">
        <button class="btn btn-outline-success" type="submit">Сохранить</button>
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
