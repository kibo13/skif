@extends('layouts.master')
<!-- deal-form -->
@section('content')
<section id="deal-form" class="valid-form section">
  <h2 class="mb-3">Информация по закупке</h2>

  <form
    class="bk-form"
    method="POST"
    action="{{ route('deals.update', $purchase) }}" >
    @csrf
    @method('PUT')

    <div class="bk-form__wrapper" data-info="Общие сведения">
      <div class="bk-form__block">

        <!-- /.purchase -->
        <h6 class="bk-form__title">Номер ведомости</h6>
        <div class="bk-form__field-full mb-2">
          <p class="bk-deals__text">№{{ $purchase->code }}</p>
        </div>

        <!-- /.materials -->
        <h6 class="bk-form__title">Список материалов</h6>
        <div class="bk-form__field-full mb-2">
          <table class="bk-table table table-bordered table-responsive mb-0">
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
                    class="bk-deals__color"
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
        </div>

        <!-- /.date_agree -->
        <h6 class="bk-form__title">Дата заключения договора</h6>
        <div class="bk-form__field-200 mb-2">
          <input
            class="form-control bk-form__input"
            id="date_off"
            type="date"
            name="date_off"
            value="{{ $purchase->date_off }}">
        </div>

        <!-- /.state -->
        <input
          class="form-control bk-form__input mb-2"
          id="state"
          type="hidden"
          name="state"
          value="{{ $purchase->state }}"
        >

        <!-- /.supplier -->
        <h6 class="bk-form__title">Поставщик</h6>
        <div class="bk-form__field-200 mb-2">
          <select 
            class="form-control bk-form__input" 
            id="supplier_id"
            name="supplier_id">
            <option disabled selected>Выберите поставщика</option>
            @foreach($suppliers as $supplier)
            <option
              value="{{ $supplier->id }}"
              @if($purchase->supplier_id == $supplier->id)
                selected
              @endif >
              {{ ucfirst($supplier->name) }}
            </option>
            @endforeach
          </select>
        </div>

        <!-- /.total -->
        <h6 class="bk-form__title">Итоговая сумма</h6>
        <div class="bk-form__field-200 mb-2">
          <input
            class="form-control bk-form__input bk-valid"
            id="count"
            type="text"
            name="total"
            value="@isset($purchase) {{ $purchase->total }} @endisset"
            placeholder="100 000"
            required />
        </div>

        <!-- /.pay -->
        <h6 class="bk-form__title">Способ оплаты</h6>
        <div class="bk-form__field-200 mb-2">
          <select class="form-control bk-form__input" id="pay" name="pay">
            <option disabled selected>Выберите способ оплаты</option>
            <option 
              value="1" 
              @if($purchase->pay == 1) selected @endif >
              Предоплата, 50%
            </option>
            <option 
              value="2" 
              @if($purchase->pay == 2) selected @endif >
              Оплата, 100%
            </option>
          </select>
        </div>

        <!-- /.depo -->
        <div id="depo-block" class="d-none">
          <h6 class="bk-form__title">К оплате</h6>
          <div class="bk-form__field-full mb-2">
            <p 
              class="bk-deals__text font-weight-bold @if($purchase->depo == 0) text-danger @else text-success @endif"
              id="deal-depo" >
              100 000
            </p>

            <div class="bk-deals__control">
              <input type="hidden" name="depo" value="0">
              <input
                class="form-control bk-form__check"
                id="depo"
                data-pay="{{ $purchase->pay }}"
                type="checkbox"
                name="depo"
                value="1"
                @if($purchase->depo) checked @endif />
              <label class="bk-form__label mb-0" for="depo">оплачено</label>
            </div>
            
            @if($purchase->pay != null)
            <div class="bk-deals__bill">
              <img
                class="bk-deals__bill-icon"
                src="{{ asset('icons/bill.svg') }}"
                alt="report" >
              <a
                class="bk-deals__bill-link"
                href="{{ route('deals.depo', $purchase) }}" >
                вывести счёт
              </a>
            </div>
            @endif
          </div>
        </div>

        <!-- /.debt -->
        <div id="debt-block" class="d-none">
          <h6 class="bk-form__title">Долг</h6>
          <div class="bk-form__field-full mb-2">
            <p 
              class="bk-deals__text font-weight-bold @if($purchase->debt == 0) text-danger @else text-success @endif"
              id="deal-debt" >
              100 000
            </p>

            <div class="bk-deals__control">
              <input type="hidden" name="debt" value="0">
              <input
                class="form-control bk-form__check"
                id="debt"
                type="checkbox"
                name="debt"
                value="1"
                @if($purchase->debt) checked @endif />
              <label class="bk-form__label mb-0" for="debt">оплачено</label>
            </div>
            
            @if($purchase->pay != null)
            <div class="bk-deals__bill">
              <img
                class="bk-deals__bill-icon"
                src="{{ asset('icons/bill.svg') }}"
                alt="report" >
              <a
                class="bk-deals__bill-link"
                href="{{ route('deals.debt', $purchase) }}" >
                вывести счёт
              </a>
            </div>
            @endif
          </div>
        </div>

        <!-- /.note -->
        <h6 class="bk-form__title">Примечание</h6>
        <div class="bk-form__field-full">
          <textarea class="form-control bk-form__text" name="note">{{ $purchase->note }}</textarea>
        </div>
      
      </div>
    </div>

    <div class="form-group">
      <button 
        class="btn btn-outline-success" 
        id="deal-save"
        type="submit">
        Сохранить
      </button>
      <a class="btn btn-outline-secondary" href="{{ route('deals.index') }}">
        Назад
      </a>
    </div>
  </form>
</section>
@endsection
