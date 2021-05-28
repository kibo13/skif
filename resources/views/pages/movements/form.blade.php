@extends('layouts.master')
<!-- movement-form -->
@section('content')
<section id="movement-form" class="access-form section">
  <h2 class="mb-3">
    @isset($movement)
      Редактирование записи
    @else
      Добавление записи
    @endisset
  </h2>

  <form
    class="bk-form"
    method="POST"
    @isset($movement)
      action="{{ route('movements.update', $movement) }}"
    @else
      action="{{ route('movements.store') }}"
    @endisset >
    @csrf

    <div>
      @isset($movement)
        @method('PUT')
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.code -->
          <h6 class="bk-form__title">Накладная</h6>
          <div class="bk-form__field-300 mb-2 bk-access" id="access-field">
            <input
              class="form-control bk-form__input"
              id="code"
              type="text"
              name="code"
              value="{{ isset($movement) ? $movement->code : getCode() }}"
              tabindex="-1"
              required
            />
          </div>

          <!-- /.access-to-code -->
          <div class="d-flex my-1" style="user-select: none">
            <input
              class="form-control bk-form__check"
              id="access-toggler"
              type="checkbox"
              tabindex="-1" />
            <label class="bk-form__label" for="access-toggler">
              редактировать номер накладной
            </label>
          </div>

          <!-- /.type of transactions -->
          <h6 class="bk-form__title">Транзакция</h6>
          <div class="bk-form__field-300 mb-2">
            <select
              class="form-control bk-form__input"
              id="movement-tot"
              name="tot" >
							<option disabled selected>Выберите транзакцию</option>
							@foreach($tots as $tot)
							<option
                value="{{ $tot['id'] }}"
                @isset($movement)
                  @if($movement->tot == $tot['id'])
								    selected
								  @endif
								@endisset >
								{{ $tot['name'] }}
							</option>
							@endforeach
						</select>
          </div>

          <!-- /.date_move -->
          <h6 class="bk-form__title">Дата транзакции</h6>
          <div class="bk-form__field-300 mb-2">
            <input
              class="form-control bk-form__input"
              id="date_move"
              type="date"
              name="date_move"
              value="{{ isset($movement) ? $movement->date_move : null }}"
              required
            />
          </div>

          <!-- /.order -->
          <div id="movement-order" class="d-none">
            <h6 class="bk-form__title">Заказ</h6>
            <div class="bk-form__field-300 mb-2">
              <select
                class="form-control bk-form__input"
                id="order_id"
                name="order_id" >
                <option disabled selected>Выберите заказ</option>
                @foreach($orders as $order)
                <option
                  value="{{ $order->id }}"
                  @isset($movement)
                    @if($movement->order_id == $order->id)
                      selected
                    @endif
                  @endisset
                >
                  {{ '№' . $order->code . ' от ' . getDMY($order->date_on) }}
                </option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- /.note -->
          <h6 class="bk-form__title">Примечание</h6>
          <div class="bk-form__field-full">
            <textarea class="form-control bk-form__text" name="note">{{ isset($movement) ? $movement->note : null }}</textarea>
          </div>

        </div>
      </div>

      <div class="form-group">
        <button
          class="btn btn-outline-success"
          id="movement-save"
          type="submit" >
          Сохранить
        </button>
        <a
          class="btn btn-outline-secondary"
          href="{{ route('movements.index') }}" >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
