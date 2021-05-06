@extends('layouts.master')
<!-- product-index -->
@section('content')
<section id="product-index" class="bk-page section">
  <h2 class="mb-3">Мебельная продукция</h2>

  <div class="bk-group">
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
        <th scope="col" class="no-sort w-100" style="min-width: 400px;">Описание</th>
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
            <img 
              class="bk-products__img" 
              src="{{asset('images/' . $product->image)}}" 
              alt="{{ $product->name }}" >
            <div class="bk-products__info">
              <h6 class="bk-products__title mb-0">{{ $product->name }}</h6>
              <p class="bk-products__item bk-products__item--sizes">
                ({{ $product->L . 'x' . $product->B . 'x' . $product->H}})
              </p>
              <p class="bk-products__item">
                <span class="bk-products__subtitle">Артикул:</span> 
                {{ $product->code }} 
              </p>
              <p class="bk-products__item">
                <span class="bk-products__subtitle">Материал:</span> 
                {{ $product->material->name }} 
              </p>
              @if($product->category->slug == 'soft')
              <p class="bk-products__item">
                <span class="bk-products__subtitle">Обивка:</span> 
                {{ $product->fabric->name }} 
              </p>
              @endif
            </div>
          </div>      
        </td>
        <td>
          <ul class="bk-products bk-products--gap-5">
          @foreach($colors as $color)
            @if($product->colors->where('id', $color->id)->count())
            <li 
              class="bk-products__item bk-products__item--color" 
              title="{{ $color->name }}" >
              <img 
                class="bk-products__img bk-products__img--full" 
                src="{{asset('images/' . $color->image)}}" 
                alt="{{ $color->name }}" >
            </li>
            @endif
          @endforeach
          </ul>
        </td>
        <td>{{ $product->category->name }}</td>
        <td>{{ number_format($product->price, 2) }} ₽</td>
        <td>
          <div class="d-flex">
            <div
              class="bk-btn bk-btn-crud btn btn-warning mr-1"
              data-tip="Редактировать"
            >
              <a
                href="{{ route('products.edit', $product) }}"
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
                data-id="{{ $product->id }}"
                data-table-name="product"
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
