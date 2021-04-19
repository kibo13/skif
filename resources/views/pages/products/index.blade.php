@extends('layouts.master')
<!-- product-index -->
@section('content')
<section id="product-index" class="bk-page section">
  <h2 class="mb-3">Мебель</h2>

  <div class="py-2 mb-1">
    <a href="{{ route('products.create') }}" class="btn btn-outline-primary">
      Новая запись
    </a>
  </div>

  <table 
      id="product-table" 
      class="bk-table table table-bordered table-hover table-responsive-sm"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Мебель</th>
        <th scope="col">Категория</th>
        <th scope="col">Цена</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
</section>
@endsection
