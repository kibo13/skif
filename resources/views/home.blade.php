@extends('layouts.master')
<!-- home-index -->
@section('content')
<section id="home-index" class="bk-page valid-form section">
  <h2 class="mb-3">Каталог мебели</h2>

  <div class="bk-group">
    <button class="btn btn-primary">CATEGORIES</button>
    @if($order != null)
    <a class="btn btn-outline-primary" href="{{ route('basket.index') }}">
      Корзина
    </a>
    @endif
  </div>

  <ul class="bk-home">
    @foreach($products as $product)
    <li class="bk-home__card">
      <img 
        class="bk-home__img"
        src="{{asset('images/' . $product->image)}}" 
        alt="{{ $product->name }}" >
      <form 
        class="bk-home__form" 
        action="" 
        method="POST" >
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
        @if($product->category->slug == 'soft')
        <p class="bk-home__text bk-home__text--price">
          <span class="bk-home__subtitle">Обивка:</span> 
          {{ $product->fabric->name }} 
        </p>
        @else 
        <p class="bk-home__text" style="opacity: 0">
          <span class="bk-home__subtitle">Обивка:</span> 
          {{-- fabric hasn't --}}
        </p>
        @endif
        <h5 class="bk-home__price">{{ number_format($product->price) }} ₽</h5>
        <ul class="bk-home__colors">
          @foreach($product->colors as $color)
          <li class="bk-home__color">
            <img 
              class="bk-home__img" 
              src="{{asset('images/' . $color->image)}}" 
              alt="{{ $color->name }}" >
            <input 
              class="bk-home__radio" 
              id="{{ $product->id . $color->id }}"
              data-color="{{ $product->id }}"
              name="color_id"
              value="{{ $color->id }}"
              type="radio" >
            <label 
              class="bk-home__label" 
              title="{{ $color->name }}"
              for="{{ $product->id . $color->id }}" ></label>
          </li>
          @endforeach
        </ul>
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
      </form>
    </li>    
    @endforeach 
  </ul>
  
</section>
@endsection
