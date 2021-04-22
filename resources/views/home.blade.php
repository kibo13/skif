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

  <ul class="bk-list">
    @foreach($categories as $category)
    <li class="card bk-list__item">
      <img 
        class="card-img-top" 
        src="{{asset('images/' . $category->image)}}" 
        alt="{{ $category->name }}">
      <div class="card-body">
        <h5 class="card-title bk-list__title">{{ $category->name }}</h5>
        <p class="card-text bk-list__text">{{ $category->description }}</p>
      </div>
    </li>
    @endforeach 
  </ul>



  
</section>
@endsection
