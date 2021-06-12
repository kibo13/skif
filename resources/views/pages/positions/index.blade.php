@extends('layouts.master')
<!-- position-index -->
@section('content')
<section id="position-index" class="bk-page section">
  <h2 class="mb-3">Должности</h2>

  <div class="bk-btn-group">
    @if(Auth::user()->permissions()->pluck('slug')->contains('emp_full'))
    <a class="btn btn-outline-primary" href="{{ route('positions.create') }}">
      Новая запись
    </a>
    @endif
    <a class="btn btn-outline-secondary" href="{{ route('workers.index') }}">
      Сотрудники
    </a>
  </div>

  <table
      id="position-table"
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-50">Должность</th>
        <th scope="col" class="w-50">Оклад</th>
        @if(Auth::user()->permissions()->pluck('slug')->contains('emp_full'))
        <th scope="col" class="no-sort">Действие</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($positions as $key => $position)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>{{ $position->name }}</td>
        <td>{{ number_format($position->salary, 2) }} ₽</td>
        @if(Auth::user()->permissions()->pluck('slug')->contains('emp_full'))
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href="{{ route('positions.edit', $position) }}"
              data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $position->id }}"
              data-table-name="position"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="Удалить" ></a>
          </div>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
