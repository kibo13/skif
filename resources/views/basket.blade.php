@extends('layouts.master')
<!-- basket-index -->
@section('content')
<section id="basket-index" class="section">
  <h2 class="mb-3">Корзина</h2>

  @if($order->getFullPrice() == 0)
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
      @foreach($order->types as $key => $type)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          <div class="bk-basket-info">
            <div class="bk-basket-info__frame">
              <img 
                class="bk-basket-info__frame-img" 
                src="{{asset('images/' . $type->image)}}" 
                alt="{{ $type->product->name }}" >
            </div>
            <div class="bk-basket-info__info">
              <h6 class="bk-basket-info__title mb-0">
                {{ $type->product->name }}
              </h6>
              <p class="bk-basket-info__item text-muted mb-1">
                ({{ $type->product->L . 'x' . $type->product->B . 'x' . $type->product->H}})
              </p>
              <p class="bk-basket-info__item">
                <span class="bk-basket-info__subtitle">Артикул:</span> 
                {{ $type->product->code }} 
                <small class="text-muted align-text-top">
                @if($type->product->category->slug == 'soft')
                  {{ $type->fabric->name }}
                @else 
                  {{ $type->plate->name }}
                @endif
                </small>
              </p>
              <p class="bk-basket-info__item">
                <span class="bk-basket-info__subtitle">Материал:</span> 
                @if($type->product->category->slug == 'soft')
                Экокожа
                @else 
                ЛДСП
                @endif
              </p>
              <p class="bk-basket-info__item">
                <span class="bk-basket-info__subtitle">Цена:</span> 
                {{ number_format($type->product->price) }} ₽
              </p>
            </div>
          </div>
        </td>
        <td>
          <div class="bk-basket-count">
            <form 
              class="bk-basket-count__add" 
              action="{{ route('basket.add.item', $type) }}" 
              method="POST" >
              @csrf 
              <button class="bk-basket-count__btn" title="Добавить">+</button>
            </form>
            <p class="bk-basket-count__field">
              {{ $type->pivot->count }}
            </p>
            <form 
              class="bk-basket-count__del" 
              action="{{ route('basket.del.item', $type) }}" 
              method="POST" >
              @csrf 
              <button class="bk-basket-count__btn" title="Удалить">-</button>
            </form>
          </div>
        </td>
        <td>{{ number_format($type->getPriceForCount()) }} ₽</td>
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
        href="{{ route('home.basket.confirm') }}" >
        Оформить заказ
      </a>
    </div>
  </div>
  @endif
  
</section>
@endsection
