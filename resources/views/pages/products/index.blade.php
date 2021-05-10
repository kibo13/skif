@extends('layouts.master')
<!-- product-index -->
@section('content')
<section id="product-index" class="bk-page section">
  <h2 class="mb-3">Мебельная продукция</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('products.create') }}">
      Новая запись
    </a>
  </div>

  <table 
      id="product-table" 
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="no-sort w-100" style="min-width: 300px;">Описание</th>
        <th scope="col" class="no-sort" style="min-width: 150px;">Цвета</th>
        <th scope="col" style="min-width: 150px;">Категория</th>
        <th scope="col" style="min-width: 150px;">Цена</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $key => $product)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          <div class="bk-products">
            <div class="bk-products__frame">
              @foreach($product->types as $id => $type)
              <img 
                class="bk-products__frame-img product-{{ $product->id }} d-none"
                data-id="{{ $type->product->id . $id }}"
                src="{{asset('images/' . $type->image)}}" 
                alt ="{{ $product->name }}" >
              @endforeach
            </div>
            <div class="bk-products__info">
              <h6 class="bk-products__title mb-0">{{ $product->name }}</h6>
              <p class="bk-products__item text-muted mb-1">
                ({{ $product->L . 'x' . $product->B . 'x' . $product->H}})
              </p>
              <p class="bk-products__item">
                <span class="bk-products__subtitle">Артикул:</span> 
                {{ $product->code }} 
              </p>
              <p class="bk-products__item">
                <span class="bk-products__subtitle">Материал:</span> 
                @if($product->category->slug == 'soft')
                Экокожа
                @else 
                ЛДСП
                @endif
              </p>
            </div>
          </div>      
        </td>
        <td>
          <ul class="bk-products__colors">
            @foreach($product->types as $id => $type)
            @if($type->plate_id == null)
            <li 
              class="bk-products__colors-item" 
              title="{{ $type->fabric->name }}" >
              <div 
                class="bk-products__colors-img" 
                style="background-color: {{ $type->fabric->code }}" >
              </div>
              <input 
                class="bk-checks__checkbox" 
                id="{{ $type->product->id . $id }}" 
                data-product="{{ 'product-' . $type->product->id }}"
                type="radio"
                name="{{ $type->product->id }}"
                value="{{ $type->fabric->id }}"
                @if($id == 0) checked @endif >
              <label class="bk-checks__label" for="{{ $type->product->id . $id }}" ></label>
            </li>
            @elseif($type->fabric_id == null)
            <li 
              class="bk-products__colors-item" 
              title="{{ $type->plate->name }}" >
              <img 
                class="bk-products__colors-img" 
                src="{{asset('images/' . $type->plate->image)}}" 
                alt="{{ $type->plate->name }}" >
              </div>
              <input 
                class="bk-checks__checkbox" 
                id="{{ $type->product->id . $id }}" 
                data-product="{{ 'product-' . $type->product->id }}"
                type="radio"
                name="{{ $type->product->id }}"
                value="{{ $type->plate->id }}"
                @if($id == 0) checked @endif >
              <label class="bk-checks__label" for="{{ $type->product->id . $id }}" ></label>
            </li>
            @endif
            @endforeach            
          </ul>
        </td>
        <td>{{ $product->category->name }}</td>
        <td>{{ number_format($product->price, 2) }} ₽</td>
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--color btn btn-info" 
              href="{{ route('products.types', $product) }}" 
              data-tip="Цвета" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href="{{ route('products.edit', $product) }}"
              data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $product->id }}"
              data-table-name="product"
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
