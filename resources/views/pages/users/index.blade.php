@extends('layouts.master') @section('content')
<section id="worker-index" class="section">
  <h2 class="mb-3">Сотрудники</h2>

  <div class="py-2 mb-1">
    <a href="{{ route('users.create') }}" class="btn btn-outline-primary">
      Новая запись
    </a>
    <a href="{{ route('positions.index') }}" class="btn btn-outline-secondary">
      Должности
    </a>
  </div>

  <div class="table-responsive">
    <table id="worker-table" class="bk-table table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Ф.И.О.</th>
          <th scope="col">Должность</th>
          <th scope="col">Оклад</th>
          <th scope="col">Адрес</th>
          <th scope="col">Телефон</th>
          <th scope="col" class="no-sort">Действие</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $key => $user)
        <tr>
          <th scope="row">{{ $key+=1 }}</th>
          <td>{{ $user->firstname }}</td>
          <td>{{ $user->firstname }}</td>
          <td>{{ $user->salary }}</td>
          <td>{{ $user->address }}</td>
          <td>{{ $user->phone }}</td>
          <td>
            <div class="d-flex">
              <div
                class="bk-btn bk-btn-crud btn btn-warning mr-1"
                data-tip="Редактировать"
              >
                <a
                  href="{{ route('users.edit', $user) }}"
                  class="bk-btn-wrap bk-btn-link"
                ></a>
                <span class="bk-btn-wrap bk-btn-icon">
                  @include('includes.icons.pen')
                </span>
              </div>

              <div class="bk-btn bk-btn-crud btn btn-danger" data-tip="Удалить">
                <a
                  href="javascript:void(0)"
                  class="bk-btn-wrap bk-btn-link bk-btn-del"
                  data-id="{{ $user->id }}"
                  data-table-name="worker"
                  data-toggle="modal"
                  data-target="#bk-delete-modal"
                >
                </a>
                <span class="bk-btn-wrap bk-btn-icon">
                  @include('includes.icons.trash')
                </span>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection
