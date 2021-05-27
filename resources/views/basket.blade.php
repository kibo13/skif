@extends('layouts.master')
<!-- basket-index -->
@section('content')
<section id="basket-index" class="section">
  <h2 class="mb-3">Корзина</h2>

  @if($order == null || $order->getFullPrice() == 0)
  <div class="bk-basket-empty">
    <img src="{{ asset('images/basket.png') }}" alt="basket" >
    <h5 class="bk-basket-empty__title">В корзине еще нет товаров...</h5>
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
        <th scope="col" class="w-100" style="min-width: 300px;">Наименование</th>
        <th scope="col">Количество</th>
        <th scope="col">Стоимость</th>
      </tr>
    </thead>
    <tbody>
      @foreach($order->tops as $key => $top)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          <div class="bk-basket-info">
            <div class="bk-basket-info__frame">
              <img
                class="bk-basket-info__frame-img"
                src="{{asset('images/' . $top->image)}}"
                alt="{{ $top->product->name }}" >
            </div>
            <div class="bk-basket-info__info">
              <h6 class="bk-basket-info__title mb-0">
                {{ $top->product->name }}
              </h6>
              <p class="bk-basket-info__item text-muted mb-1">
                ({{ $top->product->L . 'x' . $top->product->B . 'x' . $top->product->H}})
              </p>
              <p class="bk-basket-info__item">
                <span class="bk-basket-info__subtitle">Артикул:</span>
                {{ $top->product->code }}
                <small class="text-muted align-text-top">
                {{ $top->color->name }}
                </small>
              </p>
              <p class="bk-basket-info__item">
                <span class="bk-basket-info__subtitle">Материал:</span>
                {{ $top->product->material->name }}
              </p>
              <p class="bk-basket-info__item">
                <span class="bk-basket-info__subtitle">Цена:</span>
                {{ number_format($top->product->price) }} ₽
              </p>
            </div>
          </div>
        </td>
        <td>
          <div class="bk-basket-count">
            <form
              class="bk-basket-count__add"
              action="{{ route('home.basket.add', $top) }}"
              method="POST" >
              @csrf
              <button class="bk-basket-count__btn" title="Добавить">+</button>
            </form>
            <p class="bk-basket-count__field">
              {{ $top->pivot->count }}
            </p>
            <form
              class="bk-basket-count__del"
              action="{{ route('home.basket.del', $top) }}"
              method="POST" >
              @csrf
              <button class="bk-basket-count__btn" title="Удалить">-</button>
            </form>
          </div>
        </td>
        <td>{{ number_format($top->getPriceForCount()) }} ₽</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="bk-basket-footer">
    <h5 class="bk-basket-footer__total">
      <span class="bk-basket-footer__total--sm">Итого:</span>
      {{ number_format($order->getFullPrice()) }} ₽
    </h5>
    <div class="bk-basket-footer__control">
      <a
        class="btn btn-outline-secondary"
        href="{{ route('home') }}" >
        Назад
      </a>
      <a
        class="btn btn-outline-success"
        href="{{ route('home.orders.create') }}" >
        Оформить заказ
      </a>
    </div>
  </div>
  @endif

</section>
@endsection
