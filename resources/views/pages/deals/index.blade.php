@extends('layouts.master')
<!-- deal-index -->
@section('content')
<section id="deal-index" class="bk-page section">
  <h2 class="mb-3">
    Закупки
  </h2>

  {{-- control --}}
  @if($total != 0)
  <div class="bk-inspect">
    <div class="bk-inspect-top">
      <h5 class="bk-inspect-top__title">
        Контроль закупок
        <span class="bk-inspect-value">
          {{ getToday() }}
        </span>
      </h5>
      <p class="bk-inspect-top__text">
        Общее количество закупок:
        <span class="bk-inspect-value">
          {{ $total }}
        </span>
        <span class="bk-inspect-toggler bk-inspect-toggler--hide"></span>
      </p>
    </div>
    <ul class="bk-inspect-list d-none">
      <li class="bk-inspect-list__subtitle">
        Количество закупок:
      </li>
      <li class="bk-inspect-list__item">
        - в обработке
        <span class="bk-inspect-value">
          {{ $progress }}
        </span>
      </li>
      <li class="bk-inspect-list__item">
        - выполненных
        <span class="bk-inspect-value">
          {{ $complete }}
        </span>
      </li>
    </ul>
  </div>
  @endif

  <table
    id="deal-table"
    class="bk-table table table-bordered table-hover table-responsive">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-50" style="min-width: 300px">Ведомость</th>
        <th scope="col" class="w-25" style="min-width: 200px">Поставщик</th>
        <th scope="col" class="w-25" style="min-width: 200px">Статус</th>
        @if(Auth::user()->permissions()->pluck('slug')->contains('buy_full'))
        <th scope="col" class="no-sort" style="min-width: 100px">Действие</th>
        @endif       
      </tr>
    </thead>
    <tbody>
      @foreach($purchases as $key => $purchase)
      <tr>
        <td>{{ $key+=1 }}</td>
        <td>
          <h6 class="my-1">
            Ведомость №{{ $purchase->code }}
            <span class="bk-small">{{ getDMY($purchase->date_p) }}</span>
          </h6>
          @if($purchase->total != null || $purchase->pay != null)
          <p class="bk-deals__info-item">
            <span class="bk-deals__info-subtitle">Способ оплаты:</span>
            @if($purchase->pay == 1) предоплата @endif
            @if($purchase->pay == 2) оплата @endif
          </p>
          <p class="bk-deals__info-item">
            <span class="bk-deals__info-subtitle">Сумма заказа:</span>
            {{ calcTotal($purchase->total) }}
          </p>
          <hr class="bk-deals__line">
          <p class="bk-deals__info-item">
            @if($purchase->pay == 1) 
            <span class="bk-deals__info-subtitle">Предоплата:</span>
              @if($purchase->depo == 0) 
                <span class="text-danger">{{ calcDepo($purchase->total) }}</span>
              @else 
                <span class="text-success">{{ calcDepo($purchase->total) }}</span>
              @endif
            @elseif($purchase->pay == 2)
            <span class="bk-deals__info-subtitle">Оплата:</span>
              @if($purchase->depo == 0) 
                <span class="text-danger">{{ calcTotal($purchase->total) }}</span>
              @else 
                <span class="text-success">{{ calcTotal($purchase->total) }}</span>
              @endif
            @endif
          </p>
          @if($purchase->pay == 1)
          <p class="bk-deals__info-item">
            <span class="bk-deals__info-subtitle">Долг:</span>
            @if($purchase->debt == 0) 
            <span class="text-danger">{{ calcDebt($purchase->total) }}</span>
            @else 
            <span class="text-success">{{ calcDebt($purchase->total) }}</span>
            @endif
          </p>    
          @endif 
          @endif
        </td>
        <td>
          @if($purchase->supplier_id == null)
          -
          @else 
          {{ $purchase->supplier->name }}
          @endif 
        </td>
        <td>
          @if($purchase->state == 1)
          <span class="text-warning font-weight-bold">
            В обработке
          </span>
          @elseif($purchase->state == 2)
          <span class="text-success font-weight-bold">
            Выполнено
            <span class="bk-small">{{ getDMY($purchase->date_off) }}</span>
          </span>
          @endif
        </td>
        @if(Auth::user()->permissions()->pluck('slug')->contains('buy_full'))
        <td>
          <div class="bk-btn-actions">
            <a
              class="bk-btn-actions__link bk-btn-actions__link--agree btn btn-primary"
              href="{{ route('deals.agree', $purchase) }}"
              data-tip="Договор" ></a>
            <a
              class="bk-btn-actions__link bk-btn-actions__link--info btn btn-info"
              href="{{ route('deals.edit', $purchase) }}"
              data-tip="Информация" ></a>
          </div>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
