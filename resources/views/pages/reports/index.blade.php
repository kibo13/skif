@extends('layouts.master')
<!-- report-index -->
@section('content')
<section id="report-index" class="bk-page section">
  <h2 class="mb-3">Отчеты</h2>
  
  <div class="bk-form__wrapper" data-info="Формирование отчета">
    <div class="bk-form__block">

      <!-- /.reports -->
      <h6 class="bk-form__title">Отчеты</h6>
      <div class="bk-form__field-300 mb-2">
        <select id="repo-menu" class="form-control bk-form__input">
          <option disabled selected>Выберите отчет</option>
          @foreach($reports as $report)
          <option value="{{ $report['id'] }}">
            {{ $report['name'] }}
          </option>
          @endforeach
        </select>
      </div>

      <!-- /.sale -->
      @include('pages.reports.sale')

      <!-- /.budget -->
      @include('pages.reports.budget')
 
    </div>
  </div>

</section>
@endsection
