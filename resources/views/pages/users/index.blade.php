@extends('layouts.master')
<!-- user-index -->
@section('content')
<section id="user-index" class="bk-page section">
  <h2 class="mb-3">Пользователи</h2>

  <div class="py-2 mb-1">
    <a href="{{ route('users.create') }}" class="btn btn-outline-primary">
      Новая запись
    </a>
  </div>

  <div class="table-responsive">
    <table id="user-table" class="bk-table table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Сотрудник</th>
          <th scope="col">Логин</th>
          <th scope="col">Роль</th>
          <th scope="col" class="no-sort">Действие</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $key => $user)
        <tr>
          <td>{{ $key+=1 }}</td>
          <td>{{ $user->worker->fio }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->role->name }}</td>
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
                  @include('assets.icons.pen')
                </span>
              </div>

              <div class="bk-btn bk-btn-crud btn btn-danger" data-tip="Удалить">
                <a
                  href="javascript:void(0)"
                  class="bk-btn-wrap bk-btn-link bk-btn-del"
                  data-id="{{ $user->id }}"
                  data-table-name="user"
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
  </div>
  
</section>
@endsection
