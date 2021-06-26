<form 
  class="bk-charts__panel"
  action="{{ route('graph.index') }}" 
  method="GET">

  <ul class="bk-charts__block bk-charts__block--list" data-info="Графики">
    @foreach($charts as $chart)
    <li class="bk-charts__item">
      <input 
        class="bk-charts__radio" 
        id="{{ $chart['id'] }}"
        type="radio" 
        name="chart"
        data-run="{{$chart['slug']}}"
        value="{{ $chart['id'] }}"
        @if(is_null($chart_id) || $chart_id == '')
          @if($chart['id'] == 1) checked @endif
        @else 
          @if($chart['id'] == $chart_id) checked @endif
        @endif>
      <label class="bk-charts__label" for="{{ $chart['id'] }}">
        {{ $chart['name'] }}
      </label>
    </li>
    @endforeach
  </ul>

  <div 
    class="bk-charts__block bk-charts__block--form d-none" 
    data-id="1"
    data-info="Период" >

    <input 
      class="bk-charts__field" 
      id="forecast-from"
      type="date"
      name="forecast_from" 
      value="{{ $forecast_from }}"
      data-info="Начало периода"
    >

    <input 
      class="bk-charts__field" 
      id="forecast-to"
      type="date"
      name="forecast_to" 
      value="{{ $forecast_to }}"
      data-info="Конец периода"
    >

    <button 
      class="btn btn-primary"
      type="submit" 
      id="forecast-run">Сформировать</button>

    <a 
      class="btn btn-info" 
      href="{{ route('graph.index') }}">Сброс</a>

  </div>

  <div 
    class="bk-charts__block bk-charts__block--form d-none" 
    data-id="2"
    data-info="Период" >

    <input 
      class="bk-charts__field" 
      id="sales-from"
      type="date"
      name="sales_from" 
      value="{{ $sales_from }}"
      data-info="Начало периода"
    >

    <input 
      class="bk-charts__field" 
      id="sales-to"
      type="date"
      name="sales_to" 
      value="{{ $sales_to }}"
      data-info="Конец периода"
    >

    <button 
      class="btn btn-primary"
      type="submit" 
      id="sales-run">Сформировать</button>

    <a 
      class="btn btn-info" 
      href="{{ route('graph.index') }}">Сброс</a>

  </div>

  <div 
    class="bk-charts__block bk-charts__block--form d-none" 
    data-id="3"
    data-info="Период" >

    <input 
      class="bk-charts__field" 
      id="budget-from"
      type="date"
      name="budget_from" 
      value="{{ $budget_from }}"
      data-info="Начало периода"
    >

    <input 
      class="bk-charts__field" 
      id="budget-to"
      type="date"
      name="budget_to" 
      value="{{ $budget_to }}"
      data-info="Конец периода"
    >

    <button 
      class="btn btn-primary"
      type="submit" 
      id="budget-run">Сформировать</button>

    <a 
      class="btn btn-info" 
      href="{{ route('graph.index') }}">Сброс</a>

  </div>
</form>