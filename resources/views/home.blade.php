@extends('layouts.master')
<!-- home-index -->
@section('content')
<section id="home-index" class="bk-page valid-form section">
  <h2>Каталог мебели</h2>

  <div class="bk-btn-group bk-home__tools">
    <div class="bk-form__field-250">
      <form class="d-flex" action="{{ route('home') }}" method="GET">
        <select class="p-1 mr-1 form-control" name="categories">
          <option
            value="0"
            @if(is_null(session('category_id')) || session('category_id') == 0)
            selected
            @endif >Все категории</option>
          @foreach($categories as $category)
          <option
            value="{{ $category->id }}"
            @if(session('category_id') == $category->id)
            selected
            @endif >
            {{ ucfirst($category->name) }}
          </option>
          @endforeach
        </select>
        <button
          class="bk-home__tools-filter btn btn-primary"
          type="submit"
          title="Фильтр"></button>
      </form>
    </div>
    @if(Auth::user()->permissions()->pluck('slug')->contains('order_full'))
    <a
      class="btn btn-outline-primary bk-home__tools-basket"
      href="{{ route('home.basket.index') }}" >
      Корзина
      @if($order && $order->getFullPrice() > 0)
      <span class="bk-home__tools-basket-num">
        {{ $order->tops()->count() }}
      </span>
      <span class="bk-home__tools-basket-sum">
        {{ number_format($order->getFullPrice()) }} ₽
      </span>
      @endif
    </a>
    @endif
  </div>

  <ul class="bk-home">
    @foreach($products as $product)
    <li class="bk-home__card">
      <div class="bk-home__frame">
        @foreach($product->tops as $id => $top)
        <img
          class="bk-home__frame-img product-{{ $product->id }} d-none"
          data-id="{{ $top->product->id . $id }}"
          src="{{asset('images/' . $top->image)}}"
          alt ="{{ $product->name }}" >
        @endforeach
      </div>
      <form
        class="bk-home__form"
        action="{{ route('home.basket.create') }}"
        method="POST" >
        @csrf

        <h6 class="bk-home__title mb-0" title="{{ $product->name }}">
          {{ $product->name }}
        </h6>

        <p class="bk-home__text bk-home__text--sizes">
          ({{ $product->L . 'x' . $product->B . 'x' . $product->H}})
        </p>

        <p class="bk-home__text">
          <span class="bk-home__subtitle">Материал:</span>
          {{ $product->material->name }}
        </p>

        <h5 class="bk-home__price">{{ number_format($product->price) }} ₽</h5>

        <ul class="bk-home__colors">
          @foreach($product->tops as $id => $top)
          <li class="bk-home__color" title="{{ $top->color->name }}">
            <img
              class="bk-home__img"
              src="{{asset('images/' . $top->color->image)}}"
              alt="" >
            <input
              class="bk-home__radio"
              id="{{ $top->product->id . $id }}"
              data-product="{{ 'product-' . $top->product->id }}"
              type="radio"
              name="top_id"
              value="{{ $top->id }}"
              @if($id == 0) checked @endif >
            <label class="bk-home__label" for="{{ $top->product->id . $id }}">
            </label>
          </li>
          @endforeach
        </ul>

        @if(Auth::user()->permissions()->pluck('slug')->contains('order_full'))
        <div class="bk-home__control">
          <input
            class="bk-home__input form-control bk-form__input"
            data-count="{{ $product->id }}"
            name="count"
            type="text"
            maxlength="3"
            placeholder="1" >
          <button
            class="bk-home__btn"
            id="{{ $product->id }}"
            type="submit" >В корзину</button>
        </div>
        @endif

      </form>
    </li>
    @endforeach
  </ul>

</section>
@endsection
