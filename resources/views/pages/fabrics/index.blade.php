@extends('layouts.master')
<!-- fabric-index -->
@section('content')
<section id="fabric-index" class="bk-page info-form section">
  <h2 class="mb-3">Обивка</h2>

  <div class="bk-group">
    <a class="btn btn-outline-primary" href="{{ route('fabrics.create') }}">
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('materials.index') }}">
      Материалы
    </a>
  </div>

  <table
      id="fabric-table"
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25">Наименование</th>
        <th scope="col" class="w-25">Цена</th>
        <th scope="col" class="w-25 no-sort">Описание</th>
        <th scope="col" class="w-25 no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($fabrics as $key => $fabric)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>{{ $fabric->name }}</td>
        <td>{{ number_format($fabric->price, 2) }} ₽</td>
        <td>
          <div class="bk-btn-info">
            {{ $fabric->description }}
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
                href="{{ route('fabrics.edit', $fabric) }}"
                class="bk-btn-wrap bk-btn-link"
              >
              </a>
              <span class="bk-btn-wrap bk-btn-icon">
                @include('assets.icons.pen')
              </span>
            </div>

            <div class="bk-btn bk-btn-crud btn btn-danger" data-tip="Удалить">
              <a
                href="javascript:void(0)"
                class="bk-btn-wrap bk-btn-link bk-btn-del"
                data-id="{{ $fabric->id }}"
                data-table-name="fabric"
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
