@extends('layouts.master')
<!-- worker-index -->
@section('content')
<section id="worker-index" class="bk-page section">
  <h2 class="mb-3">Сотрудники</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('workers.create') }}">
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('positions.index') }}">
      Должности
    </a>
  </div>

  <table 
      id="worker-table" 
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25">Ф.И.О.</th>
        <th scope="col" class="w-25">Должность</th>
        <th scope="col" class="w-25" style="min-width: 100px">Оклад</th>
        <th scope="col" class="w-25 no-sort" style="min-width: 200px">Адрес</th>
        <th scope="col" class="no-sort" style="min-width: 200px">Телефон</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($workers as $key => $worker)
      <tr>
        <td>{{ $key+=1 }}</td>
        <td>
          {{ $worker->lastname }}<br>
          {{ $worker->firstname }}<br>
          {{ $worker->surname }}
        </td>
        <td>{{ $worker->position->name }}</td>
        <td>{{ number_format($worker->position->salary) }} ₽</td>
        <td>{{ $worker->address }}</td>
        <td>{{ $worker->phone }}</td>
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href="{{ route('workers.edit', $worker) }}"
              data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $worker->id }}"
              data-table-name="worker"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="Удалить" ></a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
