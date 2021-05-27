@extends('layouts.master')
<!-- material-index -->
@section('content')
<section id="material-index" class="bk-page section">
  <h2 class="mb-3">Материалы</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('materials.create') }}" >
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('colors.index') }}" >
      Каталог цветов
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
        <th scope="col" class="w-50 no-sort">Цвета</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($materials as $key => $material)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          @if($material->tom == 1) 
          {{ $material->name }}
          <span class="bk-small">
            {{ $material->L . 'x' . $material->B . 'x' . $material->H}}
          </span>
          @else 
          {{ $material->name }}
          @endif 
        </td>
        <td>
          @if($material->colors->count() == 0) 
          <span class="text-muted">Цвета отсутствуют</span>
          @else
          <div class="bk-material__colors">
            @foreach($material->colors as $id => $color)
            <div class="bk-material__item" title="{{ $color->name }}" >
              <img 
              class="bk-material__img" 
              src="{{asset('images/' . $color->image)}}" 
              alt="{{ $color->name }}" >
            </div>
              @endforeach        
          </div>
          @endif
        </td>
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
