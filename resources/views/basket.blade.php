@extends('layouts.master')
<!-- basket-index -->
@section('content')
<section id="basket-index" class="section">
  <h2 class="mb-3">Корзина</h2>

  @if($order->getFullPrice() == 0)
  <div class="basket-empty">
    <img src="{{ asset('images/basket.png') }}" alt="basket" >
    <h5 class="basket-empty__title">В корзине еще нет товаров...</h5>
    <a class="btn btn-outline-secondary" href="{{ route('home') }}" >
      Вернуться в каталог
    </a>
  </div>
  @else
  <table
      id="basket-table"
      class="bk-table table table-bordered table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-100">Наименование</th>
        <th scope="col">Количество</th>
        <th scope="col">Стоимость</th>
      </tr>
    </thead>
    <tbody>
      @foreach($order->products as $key => $product)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          <div class="basket-list">
            <img 
              class="basket-list__img" 
              src="{{asset('images/' . $product->image)}}" 
              alt="{{ $product->name }}" >
            <div class="basket-list__info">
              <p class="basket-list__name">{{ $product->name }}</p>
              <p class="basket-list__size">
                ({{ $product->L . 'x' . $product->B . 'x' . $product->H}})
              </p>
              <p class="basket-list__price">
                <span class="basket-list__price--bold">Цена:</span> 
                {{ number_format($product->price) }} ₽
              </p>
            </div>
          </div>
        </td>
        <td>
          <div class="basket-count">
            <form 
              class="basket-count__add" 
              action="{{ route('basket.add.item', $product) }}" 
              method="POST" >
              @csrf 
              <button class="basket-count__btn">+</button>
            </form>
            <p class="basket-count__field">
              {{ $product->pivot->count }}
            </p>
            <form 
              class="basket-count__del" 
              action="{{ route('basket.del.item', $product) }}" 
              method="POST" >
              @csrf 
              <button class="basket-count__btn">-</button>
            </form>
          </div>
        </td>
        <td>{{ number_format($product->getPriceForCount()) }} ₽</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="basket-footer">
    <h5 class="basket-footer__total">
      <span class="basket-footer__total--sm">Итого:</span>
      {{ number_format($order->getFullPrice()) }} ₽
    </h5>
    <div class="basket-footer__control">
      <a class="btn btn-outline-secondary" href="{{ route('home') }}" >
        Назад
      </a>
      <a href="{{ route('categories.create') }}" class="btn btn-outline-success">
        Оформить заказ
      </a>
    </div>
  </div>
  @endif
  
</section>
@endsection
