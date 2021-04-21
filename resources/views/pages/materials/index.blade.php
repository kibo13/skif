@extends('layouts.master')
<!-- material-index -->
@section('content')
<section id="material-index" class="bk-page section">
  <h2 class="mb-3">Материалы</h2>

  <div class="bk-group">
    <a class="btn btn-outline-primary" href="{{ route('materials.create') }}">
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('colors.index') }}">
      Каталог цветов
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('colors.index') }}">
      Обивка
    </a>
  </div>


 
</section>
@endsection
