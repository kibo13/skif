@extends('layouts.master')
<!-- graph-index -->
@section('content')
<section id="graph-index" class="bk-page section">
  <h2 class="mb-4">Графики</h2>

  <input 
    class="form-control bk-from__input mb-4 d-none" 
    id="graph-today" 
    type="date" 
    value="{{ getCurrentDay() }}"
  >

  <!-- graph-control -->
  @include('pages.charts.toolbar')

  <!-- alert -->
  @if(session()->has('warning'))
  <div class="alert alert-warning mt-2 mb-0" role="alert">
    {{ session()->get('warning') }}
  </div>
  @elseif(session()->has('success'))
  <div class="alert alert-success mt-2 mb-0" role="alert">
    {{ session()->get('success') }}
  </div>
  @endif
  
  {{-- <div class="my-4">
    Length array {{ $len }}
  </div> --}}

  <!-- forecast -->
  <div id="graph-forecast" class="bk-chart d-none" data-id="1">
    <h5 class="bk-charts__title">Прогноз продаж</h5>
    <div class="bk-charts__bar">
      {{ $chart_f->container() }}
      {{ $chart_f->script() }} 
    </div>
  </div>

  <!-- sales -->
  <div id="graph-sales" class="bk-chart d-none" data-id="2">
    <h5 class="bk-charts__title">Статистика по продажам мебельной продукции</h5>
    <div class="bk-charts__bar">
      {{ $chart_s->container() }}
      {{ $chart_s->script() }} 
    </div>
  </div>

  <!-- budget -->
  <div id="graph-budget" class="bk-chart d-none" data-id="3">
    <h5 class="bk-charts__title">Статистика по доходам и расходам</h5>
    <div class="bk-charts__bar">
      {{ $chart_b->container() }}
      {{ $chart_b->script() }} 
    </div>
  </div>

</section>
@endsection
