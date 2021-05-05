@extends('layouts.master')
<!-- home-index -->
@section('content')
<section id="home-index" class="bk-page section">
  <h2 class="mb-3">Каталог мебели</h2>

  <div class="bk-group">
    <button class="btn btn-primary">CATEGORIES</button>
    @if($order != null)
    <a class="btn btn-outline-primary" href="{{ route('basket.index') }}">
      Корзина
    </a>
    @endif
  </div>

  <ul class="bk-home-list">
    @foreach($products as $product)
    <li class="bk-home-list__item">
      <h5 class="bk-home-list__title">
        {{ $product->name }}
      </h5>
      <form 
        action="{{ route('basket.create', $product) }}"
        enctype="multipart/form-data"
        method="POST" >
        @csrf

        <input 
          type="text" 
          name="count" 
          @if($order->products->where('id', $product->id)->count())
            value="{{ $order->products->where('id', $product->id)->first()->pivot->count }}"
          @endif >

        <button class="btn btn-outline-primary">
          Add
        </button>
      </form>
    </li>    
    @endforeach 
  </ul>



  {{-- <ul class="bk-home-list">
    @foreach($categories as $category)
    <li class="bk-home-list__item">
      <img 
        class="bk-home-list__img" 
        src="{{asset('images/' . $category->image)}}" 
        alt="{{ $category->name }}">
      <h5 class="bk-home-list__title">
        {{ $category->name }}
      </h5>
    </li>
    @endforeach 
  </ul> --}}



  
</section>
@endsection
