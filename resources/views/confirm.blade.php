@extends('layouts.master')
<!-- confirm-index -->
@section('content')
<section id="confirm-index" class="section">
  <h2 class="mb-3">Подтверждение заказа</h2>



  <a 
    class="btn btn-outline-secondary" 
    href="{{ route('home.basket.index') }}" >
    Назад
  </a>

  <a 
    class="btn btn-outline-success" 
    href="" >
    Подтвердить заказ
  </a>
  
</section>
@endsection
