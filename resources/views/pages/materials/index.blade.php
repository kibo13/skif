@extends('layouts.master')
<!-- category-index -->
@section('content')
<section id="category-index" class="bk-page section">
  <h2 class="mb-3">Материалы</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('materials.create') }}" >
      Новая запись
    </a>
  </div>

  <table
      id="material-table"
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-50">Наименование</th>
        <th scope="col" class="w-25 no-sort">Примечание</th>
        <th scope="col" class="w-25 no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($materials as $key => $material)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>{{ $material->name }}</td>
        <td>{{ $material->note }}</td>
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning"
              href="{{ route('materials.edit', $material) }}"
              data-tip="Редактировать" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger"
              href="javascript:void(0)"
              data-id="{{ $material->id }}"
              data-table-name="material"
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
