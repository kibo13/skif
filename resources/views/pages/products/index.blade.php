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
            <img 
              class="bk-products__img" 
              src="" 
              alt="Картинка" >
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
                @if($product->category->slug == 'soft')
                <span class="bk-products__subtitle">Обивка:</span> 
                Экокожа
                @else 
                <span class="bk-products__subtitle">Материал:</span> 
                ЛДСП
                @endif
              </p>
            </div>
          </div>      
        </td>
        <td>
          COLORS 
        </td>
        <td>{{ $product->category->name }}</td>
        <td>{{ number_format($product->price, 2) }} ₽</td>
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--color btn btn-info" 
              href="{{ route('products.show', $product) }}" 
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
