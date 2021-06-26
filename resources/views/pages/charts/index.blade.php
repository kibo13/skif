@extends('layouts.master')
<!-- graph-index -->
@section('content')
<section id="graph-index" class="bk-page section">
  <h2 class="mb-4">Графики</h2>

  <!-- graph-control -->
  @include('pages.charts.toolbar')

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
