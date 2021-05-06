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
   
          <!-- /.state -->
          <h6 class="bk-form__title">Статус заказа</h6>
          
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
