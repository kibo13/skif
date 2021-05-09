@extends('layouts.master')
<!-- category-index -->
@section('content')
<section id="category-index" class="bk-page info-form section">
  <h2 class="mb-3">Категории</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('categories.create') }}" >
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
              class="bk-btn-info__triangle bk-btn-info__triangle--down" 
              title="Читать ещё">
            </button>
          </div>
        </td>
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href="{{ route('categories.edit', $category) }}"
              data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $category->id }}"
              data-table-name="category"
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
