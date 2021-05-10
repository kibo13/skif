@extends('layouts.master')
<!-- color-index -->
@section('content')
<section id="color-index" class="section">
  <h2 class="mb-3">Расцветки мебели</h2>

  <div class="bk-btn-group">
    <a 
      class="btn btn-outline-primary" 
      href="{{ route('products.types.create', $product) }}" >
      Новая запись
    </a>
    <a class="btn btn-outline-secondary" href="{{ route('products.index') }}" >
      Назад
    </a>
  </div>

  @if(count($types) == 0)
  <h5>Записи отсутствуют</h5>
  @else 
  <table 
      id="color-table" 
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-100 no-sort" style="min-width: 400px;">Описание</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($types as $key => $type)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          <div class="bk-colors">
            <img 
              class="bk-colors__img" 
              src="{{asset('images/' . $type->image)}}" 
              alt="{{ $product->name }}" >
            <div class="bk-colors__info">
              <h6 class="bk-colors__title mb-0">
                {{ $type->product->name }}
              </h6>
              <p class="bk-colors__item text-muted mb-1">
                ({{ $type->product->L . 'x' . $type->product->B . 'x' . $type->product->H}})
              </p>
              <p class="bk-colors__item">
                <span class="bk-colors__subtitle">Артикул:</span> 
                {{ $type->product->code }} 
                <small class="text-muted align-text-top">
                @if($type->product->category->slug == 'soft')
                  {{ $type->fabric->name }}
                @else 
                  {{ $type->plate->name }}
                @endif
                </small>
              </p>
              <p class="bk-colors__item">
                <span class="bk-colors__subtitle">Материал:</span> 
                @if($type->product->category->slug == 'soft')
                Экокожа
                @else 
                ЛДСП
                @endif
              </p>
              <p class="bk-colors__item">
                <span class="bk-colors__subtitle">Цвет:</span>
                @if($type->product->category->slug == 'soft')
                {{ $type->fabric->name }}
                @else
                {{ $type->plate->name }}
                @endif
              </p>
            </div>
          </div>      
        </td>
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href="{{ route('products.types.edit', ['product' => $product, 'type' => $type]) }}"
              data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $type->id }}"
              data-product="{{ $product->id }}"
              data-table-name="type"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="Удалить" ></a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</section>
@endsection
