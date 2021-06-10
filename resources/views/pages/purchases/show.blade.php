@extends('layouts.master')
<!-- purchase-show -->
@section('content')
<section id="purchase-show" class="section">
  <h2 class="mb-3">Перечень материалов</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-secondary" href="{{ route('purchases.index') }}" >
      Назад
    </a>
  </div>

  @if(count($purchase->poms) == 0)
  <h5>Записи отсутствуют</h5>
  @else 
  <table class="bk-table table table-bordered table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-100" style="min-width: 200px;">Наименование</th>
        <th scope="col" class="text-center" style="min-width: 150px;">Цвет</th>
        <th scope="col" class="text-center" style="min-width: 150px;">Кол-во</th>
        <th scope="col" class="text-center" style="min-width: 150px;">Ед.изм</th>
      </tr>
    </thead>
    <tbody>
      @foreach($purchase->poms as $id => $pom)
      <tr>
        <td>{{ $id+=1 }}</td>
        <td>
          {{ $pom->material->name }}
          @if($pom->material->L != null || $pom->material->B != null || $pom->material->H != null)
          <span class="bk-small">
            {{ $pom->material->L . 'x' . $pom->material->B . 'x' . $pom->material->H}}
          </span>
          @endif
        </td>
        <td class="text-center">
          @if($pom->color_id != null)
          <img
            class="bk-purchases-color"
            src="{{asset('images/' . $pom->color->image)}}"
            alt ="{{ $pom->color->name }}"
            title="{{ $pom->color->name }}" >
          @else
          -
          @endif
        </td>
        <td class="text-center">{{ $pom->count }}</td>
        <td class="text-center">{{ $pom->material->measure }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</section>
@endsection
