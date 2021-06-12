@extends('layouts.master')
<!-- user-index -->
@section('content')
<section id="user-index" class="bk-page info-form section">
  <h2 class="mb-3">Пользователи</h2>

  @if(Auth::user()->permissions()->pluck('slug')->contains('user_full'))
  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('users.create') }}">
      Новая запись
    </a>
  </div>
  @endif

  <table 
      id="user-table" 
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" style="min-width: 150px;">Сотрудник</th>
        <th scope="col" style="min-width: 150px;">Логин</th>
        <th scope="col" style="min-width: 150px;">Роль</th>
        <th scope="col" class="w-100 no-sort">Права</th>
        @if(Auth::user()->permissions()->pluck('slug')->contains('user_full'))
        <th scope="col" class="no-sort">Действие</th>
        @endif
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
          <div class="bk-btn-info py-1">
            @foreach($sections as $section)
            @if($user->permissions->where('name', $section)->count())
            {{ $section }}
            @endif

            @if($user->permissions->where('name', $section)->count() == 2)
            @foreach($user->permissions as $perm)
            @if($perm->name == $section)
            <small class="bk-small">{{$perm->desc}}</small>
            @endif
            @endforeach
            @else
            @foreach($user->permissions as $perm)
            @if($perm->name == $section)
            <small class="bk-small">{{$perm->desc}}</small>
            @endif
            @endforeach
            @endif

            @if($user->permissions->where('name', $section)->count())
            <br>
            @endif
            @endforeach
            <button
              class="bk-btn-info__triangle bk-btn-info__triangle--down"
              title="Читать ещё">
            </button>
          </div>
        </td>
        @if(Auth::user()->permissions()->pluck('slug')->contains('user_full'))
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
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  
</section>
@endsection
