@extends('layouts.master')
<!-- graph-index -->
@section('content')
<section id="graph-index" class="bk-page section">
  <h2 class="mb-3">Графики</h2>

  <form 
    class="bk-charts__group" 
    action="{{ route('graph.index') }}" 
    method="GET" >

    <input 
      class="bk-charts__field" 
      id="graph-from"
      type="date"
      name="date_from" 
      data-info="Начало периода"
      value="{{ $from }}"
      required >
    
    <input 
      class="bk-charts__field" 
      id="graph-to"
      type="date"
      name="date_to" 
      data-info="Конец периода"
      value="{{ $to }}"
      required >

    <button
      class="bk-charts__btn bk-charts__btn--filter  btn btn-primary"
      id="graph-filter"
      type="submit"
      title="Фильтр"></button>

    <a
      class="bk-charts__btn bk-charts__btn--reset  btn btn-info"
      href="{{ route('graph.index') }}"
      title="Сброс"></a>

  </form>
  
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a 
        class="brief-link nav-link px-2 px-sm-3 active" 
        id="forecast-tab" 
        data-toggle="tab" 
        href="#forecast" 
        role="tab" 
        aria-controls="forecast" 
        aria-selected="true">
        Прогноз
      </a>
    </li>
    <li class="nav-item">
      <a 
        class="brief-link nav-link px-2 px-sm-3" 
        id="sales-tab" 
        data-toggle="tab" 
        href="#sales" 
        role="tab" 
        aria-controls="sales" 
        aria-selected="false">
        Статистика 
        <small class="text-muted align-top">Продажи</small>
      </a>
    </li>
    <li class="nav-item">
      <a 
        class="brief-link nav-link px-2 px-sm-3" 
        id="budget-tab" 
        data-toggle="tab" 
        href="#budget" 
        role="tab" 
        aria-controls="budget" 
        aria-selected="false">
        Статистика 
        <small class="text-muted align-top">Приход/Расход</small>
      </a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <!-- forecast -->
    <div 
      class="tab-pane fade show active" 
      id="forecast" 
      role="tabpanel" 
      aria-labelledby="forecast-tab">
      <div class="row p-0 m-0">
        <h5 class="w-100 p-2 my-1">
          Прогноз продаж
        </h5>
        <div class="w-100" style="height: 400px;">
          {{-- {{ $chart_s->container() }}
          {{ $chart_s->script() }}  --}}
        </div>
      </div>
    </div>

    <!-- sales -->
    <div 
      class="tab-pane fade" 
      id="sales" 
      role="tabpanel" 
      aria-labelledby="sales-tab">
      <div class="row p-0 m-0">
        <h5 class="w-100 p-2 my-1">
          Статистика по продажам мебельной продукции
        </h5>
        <div class="w-100" style="height: 400px;">
          {{ $chart_s->container() }}
          {{ $chart_s->script() }} 
        </div>
      </div>
    </div>

    <!-- budget -->
    <div 
      class="tab-pane fade" 
      id="budget" 
      role="tabpanel" 
      aria-labelledby="budget-tab">
      <div class="row p-0 m-0">
        <h5 class="w-100 p-2 my-1">Статистика по доходам и расходам</h5>
        <div class="w-100" style="height: 400px;">
          {{ $chart_b->container() }}
          {{ $chart_b->script() }} 
        </div>
      </div>
    </div>
  </div>

</section>
@endsection
