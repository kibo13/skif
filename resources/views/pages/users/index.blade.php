@extends('layouts.master')
<!-- user-index -->
@section('content')
<section id="user-index" class="bk-page section">
  <h2 class="mb-3">Пользователи</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('users.create') }}">
      Новая запись
    </a>
  </div>

  <table 
      id="user-table" 
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-50">Сотрудник</th>
        <th scope="col" class="w-25">Логин</th>
        <th scope="col" class="w-25">Роль</th>
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
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href="{{ route('users.edit', $user) }}"
              data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $user->id }}"
              data-table-name="user"
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
