@extends('layouts.master')
<!-- color-index -->
@section('content')
<section id="color-index" class="bk-page section">
  <h2 class="mb-3">Каталог цветов</h2>

  <div class="bk-group">
    <a class="btn btn-outline-primary" href="{{ route('colors.create') }}">
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('materials.index') }}">
      Материалы
    </a>
  </div>

  <table
      id="color-table"
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-50">Название</th>
        <th scope="col" class="w-25 no-sort">Образец</th>
        <th scope="col" class="w-25 no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($colors as $key => $color)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>{{ $color->name }}</td>
        <td>
          <img class="bk-table__img" src="{{ Storage::url($color->image) }}" alt="{{ $color->name }}">
        </td>
        <td>
          <div class="d-flex">
            <div
              class="bk-btn bk-btn-crud btn btn-warning mr-1"
              data-tip="Редактировать"
            >
              <a
                href="{{ route('colors.edit', $color) }}"
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
                data-id="{{ $color->id }}"
                data-table-name="color"
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
