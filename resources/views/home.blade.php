@extends('layouts.master')
<!-- home-index -->
@section('content')
<section id="home-index" class="bk-page section">
  <h2 class="mb-3">Мебель на заказ</h2>

  <div class="py-2 mb-1">
    <a href="#!" class="btn btn-outline-primary">
      Заказать
    </a>
  </div>

  <ul class="bk-home-list">
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
  </ul>



  
</section>
@endsection
