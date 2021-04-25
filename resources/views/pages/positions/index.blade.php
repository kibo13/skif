@extends('layouts.master')
<!-- position-index -->
@section('content')
<section id="position-index" class="bk-page section">
  <h2 class="mb-3">Должности</h2>

  <div class="bk-group">
    <a class="btn btn-outline-primary" href="{{ route('positions.create') }}">
      Новая запись
    </a>
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
        <th scope="col" class="w-25">Оклад</th>
        <th scope="col" class="w-25 no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($positions as $key => $position)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>{{ $position->name }}</td>
        <td>{{ number_format($position->salary, 2) }} ₽</td>
        <td>
          <div class="d-flex">
            <div
              class="bk-btn bk-btn-crud btn btn-warning mr-1"
              data-tip="Редактировать"
            >
              <a
                href="{{ route('positions.edit', $position) }}"
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
                data-id="{{ $position->id }}"
                data-table-name="position"
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
