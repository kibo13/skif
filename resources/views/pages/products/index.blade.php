@extends('layouts.master')
<!-- product-index -->
@section('content')
<section id="product-index" class="bk-page section">
  <h2 class="mb-3">Мебельная продукция</h2>

  @if(Auth::user()->permissions()->pluck('slug')->contains('furn_full'))
  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('products.create') }}">
      Новая запись
    </a>
  </div>
  @endif

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
              @foreach($product->tops as $id => $top)
              <img 
                class="bk-products__frame-img product-{{ $product->id }} d-none"
                data-id="{{ $top->product->id . $id }}"
                src="{{asset('images/' . $top->image)}}" 
                alt ="{{ $product->name }}" >
              @endforeach
            </div>
            <div class="bk-products__info">
              <h6 class="bk-products__title mb-1">{{ $product->name }}</h6>
              <p class="bk-products__item">
                <span class="bk-products__subtitle">Артикул:</span> 
                {{ $product->code }} 
              </p>
              <p class="bk-products__item">
                <span class="bk-products__subtitle">Размер:</span> 
                {{ $product->L . 'x' . $product->B . 'x' . $product->H}}
              </p>
              <p class="bk-products__item">
                <span class="bk-products__subtitle">Материал:</span> 
                {{ $product->material->name }} 
              </p>
            </div>
          </div>      
        </td>
        <td>
          <ul class="bk-products__colors">
            @foreach($product->tops as $id => $top)
            <li 
              class="bk-products__colors-item" 
              title="{{ $top->color->name }}" >
              <img 
                class="bk-products__colors-img" 
                src="{{asset('images/' . $top->color->image)}}" 
                alt="{{ $top->color->name }}" >
              </div>
              <input 
                class="bk-checks__checkbox" 
                id="{{ $top->product->id . $id }}" 
                data-product="{{ 'product-' . $top->product->id }}"
                type="radio"
                name="{{ $top->product->id }}"
                value="{{ $top->color->id }}"
                @if($id == 0) checked @endif >
              <label class="bk-checks__label" for="{{ $top->product->id . $id }}" ></label>
            </li>
            @endforeach            
          </ul>
        </td>
        <td>{{ $product->category->name }}</td>
        <td>{{ number_format($product->price, 2) }} ₽</td>
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--color btn btn-info" 
              href="{{ route('products.tops', $product) }}" 
              data-tip="Цвета" ></a>
            @if(Auth::user()->permissions()->pluck('slug')->contains('furn_full'))
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
            @endif
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
