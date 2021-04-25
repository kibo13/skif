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
        <th scope="col" class="no-sort">Фото</th>
        <th scope="col" class="no-sort w-50">Описание</th>
        <th scope="col" class="w-25">Категория</th>
        <th scope="col" class="w-25">Цена</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $key => $product)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          <img 
            class="bk-info__img"
            src="{{asset('images/' . $product->image)}}" 
            alt="{{ $product->name }}">
        </td>
        <td>
          <div class="bk-info">
            <h6 class="bk-info__title">{{ $product->name }}</h6>
            <p class="bk-info__size">
              ({{ $product->L . 'x' . $product->B . 'x' . $product->H}})
            </p>
          </div>          
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
