@extends('layouts.master')
<!-- worker-index -->
@section('content')
<section id="worker-index" class="bk-page section">
  <h2 class="mb-3">Сотрудники</h2>

  <div class="py-2 mb-1">
    <a href="{{ route('workers.create') }}" class="btn btn-outline-primary">
      Новая запись
    </a>
    <a href="{{ route('positions.index') }}" class="btn btn-outline-secondary">
      Должности
    </a>
  </div>

  <table 
      id="worker-table" 
      class="bk-table table table-bordered table-hover table-responsive-sm"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Ф.И.О.</th>
        <th scope="col">Должность</th>
        <th scope="col">Оклад</th>
        <th scope="col" class="no-sort">Адрес</th>
        <th scope="col" class="no-sort">Телефон</th>
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
        <td>{{ number_format($worker->position->salary) }}</td>
        <td>{{ $worker->address }}</td>
        <td>{{ $worker->phone }}</td>
        <td>
          <div class="d-flex">
            <div
              class="bk-btn bk-btn-crud btn btn-warning mr-1"
              data-tip="Редактировать"
            >
              <a
                href="{{ route('workers.edit', $worker) }}"
                class="bk-btn-wrap bk-btn-link"
              ></a>
              <span class="bk-btn-wrap bk-btn-icon">
                @include('assets.icons.pen')
              </span>
            </div>

            <div class="bk-btn bk-btn-crud btn btn-danger" data-tip="Удалить">
              <a
                href="javascript:void(0)"
                class="bk-btn-wrap bk-btn-link bk-btn-del"
                data-id="{{ $worker->id }}"
                data-table-name="worker"
                data-toggle="modal"
                data-target="#bk-delete-modal"
              >
              </a>
              <span class="bk-btn-wrap bk-btn-icon">
                @include('assets.icons.trash')
              </span>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
