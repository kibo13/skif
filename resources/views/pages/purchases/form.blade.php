@extends('layouts.master')
<!-- purchase-form -->
@section('content')
<section id="purchase-form" class="bk-page section">
  <h2 class="mb-3">
    @if(count($purchase->poms) == 0)
      Создание ведомости
    @else
      Редактирование ведомости
    @endif
  </h2>

  <div class="bk-btn-group">
    @if($purchase->state == 0)
    <a class="btn btn-outline-success" href="{{ route('purchases.complete', $purchase) }}" >
      Сохранить 
    </a>
    @else 
    <a class="btn btn-outline-secondary" href="{{ route('purchases.index') }}" >
      Назад 
    </a>
    @endif 
  </div>

  <table
    id="purchase-table"
    class="bk-table table table-bordered table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="" style="min-width: 200px;">Наименование</th>
        <th scope="col" class="no-sort" style="min-width: 100px;">Цвет</th>
        <th scope="col" class="no-sort" style="min-width: 100px;">Ед.изм</th>
        <th scope="col" class="w-100 no-sort" style="min-width: 100px;">Кол-во</th>
      </tr>
    </thead>
    <tbody>
      @foreach(getAllMaterials() as $id => $mat)
      <tr>
        <td>{{ $id+=1 }}</td>
        <td>
          {{ $mat->material }}
          @if($mat->L != null || $mat->B != null || $mat->H != null)
          <span class="bk-small">
            {{ $mat->L . 'x' . $mat->B . 'x' . $mat->H}}
          </span>
          @endif
        </td>
        <td>
          @if($mat->image != null)
          <img
            class="bk-purchases-color"
            src="{{asset('images/' . $mat->image)}}"
            alt ="{{ $mat->color }}"
            title="{{ $mat->color }}" >
          @else
          -
          @endif
        </td>
        <td>{{ $mat->measure }}</td>
        <td>
          <form action="{{ route('purchases.poms.create') }}" method="GET">
            @csrf
            <div class="bk-purchases-form">
              <!-- /.purchase_id -->
              <input
                class="form-control bk-form__input mb-2"
                type="hidden"
                name="purchase_id"
                value="{{ $purchase->id }}"
              >

              <!-- /.material_id -->
              <input
                class="form-control bk-form__input mb-2"
                type="hidden"
                name="material_id"
                value="{{ $mat->material_id }}"
              >

              <!-- /.color_id -->
              <input
                class="form-control bk-form__input mb-2"
                type="hidden"
                name="color_id"
                value="{{ $mat->color_id }}"
              >

              <!-- /.count -->
              <div class="bk-purchases-form__field">
                <input
                  class="bk-purchases-form__input"
                  type="text"
                  name="count"
                  @foreach($purchase->poms as $pom)
                  @if($pom->material_id == $mat->material_id && $pom->color_id == $mat->color_id)
                  value="{{ $pom->count }}"
                  @endif 
                  @endforeach 
                  maxlength="4"
                  required>
              </div>

              <div class="bk-btn-actions">
                <button
                  class="bk-btn-actions__link bk-btn-actions__link--diskette btn btn-success"
                  type="submit"
                  data-tip="Сохранить"></button>
                <a
                  class="bk-btn-actions__link bk-btn-actions__link--cancel btn btn-danger"
                  @foreach($purchase->poms as $pom)
                  @if($pom->material_id == $mat->material_id && $pom->color_id == $mat->color_id)
                  href="{{ route('purchases.poms.del', $pom) }}"
                  @endif 
                  @endforeach 
                  data-tip="Отмена"></a>
              </div>
            </div>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</section>
@endsection
