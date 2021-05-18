@extends('layouts.master')
<!-- detail-form -->
@section('content')
<section id="detail-form" class="section">
  <h2 class="mb-3">Информация по заказу</h2>

  {{-- 
    
    1. меняем поля на 0 и 1 
    2. добавляем форму edit вместо модалки 
    3. 
    
    --}}

  <div class="bk-detail">

    <div class="bk-detail-info table-responsive">
      <table class="bk-table table table-bordered">
        <thead class="thead-light">
          <tr>
            <th colspan="2">
              Заказ №{{ $order->code }} от {{ getDMY($order->date_on) }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="w-25">Заказчик:</th>
            <td class="w-75">
              @if($order->customer->type_id == 1)
              {{ $order->customer->lastname . ' ' . $order->customer->firstname . ' ' . $order->customer->surname }}, 
              <span class="bk-detail-value">ИИН</span> 
              {{ $order->customer->code }}, 
              {{ $order->customer->address }}
              @else
              {{ $order->customer->name }}, 
              <span class="bk-detail-value">БИН</span> 
              {{ $order->customer->code }}, 
              {{ $order->customer->address }}
              @endif
            </td>
          </tr>
          <tr>
            <th class="w-25">Способ оплаты:</th>
            <td class="w-75">
              @if($order->pay == 1)
              Предоплата
              @elseif($order->pay == 2)
              Оплата
              @endif
            </td>
          </tr>
          <tr>
            <th class="w-25">Сумма заказа:</th>
            <td class="w-75">
              {{ number_format($order->total) }} ₽
            </td>
          </tr>
          <tr>
            <th class="w-25">Оплачено:</th>
            <td class="w-75">
              {{ number_format($order->depo) }} ₽
            </td>
          </tr>
          <tr>
            <th class="w-25">Остаток:</th>
            <td class="w-75">
              {{ number_format($order->debt) }} ₽
            </td>
          </tr>
          <tr>
            <th class="w-25">Статус заказа:</th>
            <td class="w-75">
              @if($order->state == 1)
              <span class="bk-detail-value text-danger">
                В обработке
              </span>
              @elseif($order->pay == 2)
              <span class="bk-detail-value text-success">
                Готов
                @if($order->date_off != null)
                <small class="bk-detail-value--date">
                  {{ getDMY($order->date_off) }}
                </small>
                @endif
              </span>
              @endif
            </td>
          </tr>
          <tr>
            <th class="w-25">Примечание к заказу:</th>
            <td class="w-75">
              @if($order->note == null)
                особых пожеланий нет
              @else 
               {{ $order->note }}
              @endif
            </td>
          </tr>
          
        </tbody>
      </table>
    </div>

  </div>

  

  
</section>
@endsection
