@extends('layouts.master')
<!-- customer-index -->
@section('content')
<section id="customer-index" class="bk-page info-form section">
  <h2 class="mb-3">Клиенты</h2>

  <div class="bk-btn-group">
    <a class="btn btn-outline-primary" href="{{ route('customers.create') }}">
      Новая запись
    </a>
  </div>

  <table 
      id="customer-table" 
      class="bk-table table table-bordered table-hover table-responsive"
    >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-25" style="min-width: 200px">Клиент</th>
        <th scope="col" class="w-25">Тип</th>
        <th scope="col" class="w-25" style="min-width: 200px">ИИН/БИН</th>
        <th scope="col" class="w-25 no-sort" style="min-width: 300px">Контакты</th>
        <th scope="col" class="no-sort">Действие</th>
      </tr>
    </thead>
    <tbody>
      @foreach($customers as $key => $customer)
      <tr>
        <td scope="row">{{ $key+=1 }}</td>
        <td>
          @if($customer->type_id == 1) 
            <div title="{{ $customer->lastname . ' ' . $customer->firstname . ' ' . $customer->surname}}">
              {{ getFIO($customer->lastname, $customer->firstname, $customer->surname) }}
            </div>
          @else
            {{ $customer->name }}
          @endif 
        </td>
        <td>
          @if($customer->type_id == 1) 
            <div title="Физическое лицо">ФЛ</div>
          @else
            <div title="Юридическое лицо">ЮЛ</div>
          @endif 
        </td>
        <td>
          {{ $customer->code }} 
          <small class="text-muted align-top">
          @if($customer->type_id == 1) 
            ИИН
          @else
            БИН
          @endif 
          </small>
        </td>
        <td>
          <div class="bk-btn-info">
            @if($customer->email != null) 
              Почта: {{ $customer->email }}<br>
            @endif
            @if($customer->phone != null) 
              Тел: {{ $customer->phone }}<br>
            @endif
            @if($customer->address != null) 
              Адрес: {{ $customer->address }}
            @endif
            <button 
              class="bk-btn-info__triangle bk-btn-info__triangle--down" 
              title="Читать ещё">
            </button>
          </div>
        </td>
        <td>
          <div class="bk-btn-actions">
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--edit btn btn-warning" 
              href="{{ route('customers.edit', $customer) }}"
              data-tip="Редактировать" ></a>
            <a 
              class="bk-btn-actions__link bk-btn-actions__link--delete btn btn-danger" 
              href="javascript:void(0)"
              data-id="{{ $customer->id }}"
              data-table-name="customer"
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
