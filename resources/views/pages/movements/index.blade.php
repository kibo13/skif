@extends('layouts.master')
<!-- movement-index -->
@section('content')
<section id="movement-index" class="bk-page section">
  <h2 class="mb-3" id="movement-title">
    Остаток материалов
  </h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('movements.create') }}">
      Новая запись
    </a>
  </div>

  <table
    id="movement-table"
    class="bk-table table table-bordered table-hover table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25" style="min-width: 150px;">Накладная</th>
        <th scope="col" class="w-25" style="min-width: 100px;">Транзакция</th>
        <th scope="col" class="w-25" style="min-width: 100px;">Дата</th>
        <th scope="col" class="w-25 no-sort" style="min-width: 200px;">Примечание</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($movements as $key => $movement)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>№{{ $movement->code }}</td>
        <td>
          @if($movement->tot == 1)
          Приход
          @else
          Расход
          @endif
        </td>
        <td>{{ getDMY($movement->date_move) }}</td>
        <td>{{ $movement->note }}</td>
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--info btn btn-info"
              href="{{ route('movements.moms', $movement) }}" 
              data-tip="Информация" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
              href="{{ route('movements.edit', $movement) }}"
              data-tip="Редактировать" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $movement->id }}"
              data-table-name="movement"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="Удалить" ></a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a
        class="js-movement-tab nav-link px-2 px-sm-3 active"
        id="movement-tab"
        data-toggle="tab"
        href="#movement"
        role="tab"
        aria-controls="movement"
        aria-selected="true">Движение</a>
    </li>
    <li class="nav-item">
      <a
        class="js-movement-tab nav-link px-2 px-sm-3"
        id="rest-tab"
        data-toggle="tab"
        href="#rest"
        role="tab"
        aria-controls="rest"
        aria-selected="false">Остаток</a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">

    <!-- movement-panel -->
		<div
      class="tab-pane fade"
      id="movement"
      role="tabpanel"
      aria-labelledby="movement-tab">

      <div class="bk-btn-group">
        <a class="btn btn-outline-primary" href="{{ route('movements.create') }}">
          Новая запись
        </a>
      </div>

      <table
          id="movement-table"
          class="bk-table table table-bordered table-hover table-responsive">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col" class="w-25" style="min-width: 100px;">Транзакция</th>
            <th scope="col" class="w-25" style="min-width: 150px;">Накладная</th>
            <th scope="col" class="w-25" style="min-width: 100px;">Дата</th>
            <th scope="col" class="w-25 no-sort" style="min-width: 200px;">Примечание</th>
            <th scope="col" class="no-sort">Действие</th>
          </tr>
        </thead>
        <tbody>
          @foreach($movements as $key => $movement)
          <tr>
            <td scope="row">{{ $key+=1 }}</td>
            <td>
              @if($movement->tot == 1)
              Приход
              @else
              Расход
              @endif
            </td>
            <td>№{{ $movement->code }}</td>
            <td>{{ getDMY($movement->date_move) }}</td>
            <td>{{ $movement->note }}</td>
            <td>
              <div class="bk-btn-actions">
                <a
                  class="bk-btn-actions__link bk-btn-actions__link--color btn btn-info"
                  href=""
                  data-tip="Цвета" ></a>
                <a
                  class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
                  href="{{ route('movements.edit', $movement) }}"
                  data-tip="Редактировать" ></a>
                <a
                  class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
                  href="javascript:void(0)"
                  data-id="{{ $movement->id }}"
                  data-table-name="movement"
                  data-toggle="modal"
                  data-target="#bk-delete-modal"
                  data-tip="Удалить" ></a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
		<!-- rest-panel -->
		<div
			class="tab-pane fade"
			id="rest"
			role="tabpanel"
			aria-labelledby="rest-tab">

			REST HERE

		</div>

		
  </div> --}}


</section>
@endsection
