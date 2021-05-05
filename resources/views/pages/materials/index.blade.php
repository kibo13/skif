@extends('layouts.master')
<!-- material-index -->
@section('content')
<section id="material-index" class="bk-page section">
  <h2 class="mb-3">Вид древесины</h2>

  <div class="bk-group">
    <a class="btn btn-outline-primary" href="{{ route('materials.create') }}">
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('colors.index') }}">
      Материалы
    </a>
  </div>

  <table
      id="material-table"
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25">Наименование</th>
        <th scope="col" class="w-75 no-sort">Описание</th>
        <th scope="col" class="w-25 no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($materials as $key => $material)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>{{ $material->name }}</td>
        <td>{{ $material->description }}</td>
        <td>
          <div class="d-flex">
            <div
              class="bk-btn bk-btn-crud btn btn-warning mr-1"
              data-tip="Редактировать"
            >
              <a
                href="{{ route('materials.edit', $material) }}"
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
                data-id="{{ $material->id }}"
                data-table-name="material"
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
