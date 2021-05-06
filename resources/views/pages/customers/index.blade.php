@extends('layouts.master')
<!-- customer-index -->
@section('content')
<section id="customer-index" class="bk-page info-form section">
  <h2 class="mb-3">Клиенты</h2>

  <div class="bk-group">
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
              class="bk-btn-triangle bk-btn-triangle--down" 
              title="Читать ещё">
            </button>
          </div>
        </td>
        <td>
          <div class="d-flex">
            <div
              class="bk-btn bk-btn-crud btn btn-warning mr-1"
              data-tip="Редактировать"
            >
              <a
                href="{{ route('customers.edit', $customer) }}"
                class="bk-btn-wrap bk-btn-link"
              >
              </a>
              <span class="bk-btn-wrap bk-btn-icon">
                @include('assets.icons.pen')
              </span>
            </div>

            <div class="bk-btn bk-btn-crud btn btn-danger" data-tip="Удалить">
              <a
                href="javascript:void(0)"
                class="bk-btn-wrap bk-btn-link bk-btn-del"
                data-id="{{ $customer->id }}"
                data-table-name="customer"
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
