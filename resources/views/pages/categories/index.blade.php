@extends('layouts.master')
<!-- category-index -->
@section('content')
<section id="category-index" class="bk-page info-form section">
  <h2 class="mb-3">Категории</h2>

  <div class="py-2 mb-1">
    <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">
      Новая запись
    </a>
  </div>

  <table
      id="category-table"
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25 no-sort">Категория</th>
        <th scope="col" class="w-75 no-sort">Описание</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $key => $category)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>{{ $category->name }}</td>
        <td>
          <div class="bk-btn-info">
            {{ $category->description }}
            <button 
              class="bk-btn-triangle bk-btn-triangle--down" 
              title="Читать ещё">
            </button>
          </div>
        </td>
        <td>
          <div class="d-flex">
            <div
              class="bk-btn bk-btn-crud btn btn-warning mr-1"
              data-tip="Редактировать"
            >
              <a
                href="{{ route('categories.edit', $category) }}"
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
                data-id="{{ $category->id }}"
                data-table-name="category"
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
