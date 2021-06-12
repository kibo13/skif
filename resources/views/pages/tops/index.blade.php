@extends('layouts.master')
<!-- top-index -->
@section('content')
<section id="top-index" class="section">
  <h2 class="mb-3">Расцветка мебели</h2>

  <div class="bk-btn-group">
    @if(Auth::user()->permissions()->pluck('slug')->contains('furn_full'))
    <a 
      class="btn btn-outline-primary" 
      href="{{ route('products.tops.create', $product) }}" >
      Новая запись
    </a>
    @endif
    <a class="btn btn-outline-secondary" href="{{ route('products.index') }}" >
      Назад
    </a>
  </div>

  @if(count($tops) == 0)
  <h5>Записи отсутствуют</h5>
  @else 
  <table 
      id="top-table" 
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-100 no-sort" style="min-width: 400px;">Описание</th>
        @if(Auth::user()->permissions()->pluck('slug')->contains('furn_full'))
        <th scope="col" class="no-sort">Действие</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($tops as $key => $top)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          <div class="bk-tops">
            <img 
              class="bk-tops__img" 
              src="{{asset('images/' . $top->image)}}" 
              alt="{{ $product->name }}" >
            <div class="bk-tops__info">
              <h6 class="bk-tops__title mb-0">
                {{ $top->product->name }}
              </h6>
              <p class="bk-tops__item text-muted mb-1">
                ({{ $top->product->L . 'x' . $top->product->B . 'x' . $top->product->H}})
              </p>
              <p class="bk-tops__item">
                <span class="bk-tops__subtitle">Артикул:</span> 
                {{ $top->product->code }} 
                <small class="text-muted align-text-top">
                {{ $top->color->name }}
                </small>
              </p>
              <p class="bk-tops__item">
                <span class="bk-tops__subtitle">Материал:</span> 
                {{ $top->product->material->name }}
              </p>
              <p class="bk-tops__item">
                <span class="bk-tops__subtitle">Цвет:</span>
                {{ $top->color->name }}
              </p>
            </div>
          </div>      
        </td>
        @if(Auth::user()->permissions()->pluck('slug')->contains('furn_full'))
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href="{{ route('products.tops.edit', ['product' => $product, 'top' => $top]) }}"
              data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $top->id }}"
              data-product="{{ $product->id }}"
              data-table-name="top"
              data-toggle="modal"
              data-target="#bk-delete-modal"
              data-tip="Удалить" ></a>
          </div>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</section>
@endsection
