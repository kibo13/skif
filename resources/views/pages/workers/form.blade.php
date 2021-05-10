@extends('layouts.master')
<!-- worker-form -->
@section('content')
<section id="worker-form" class="valid-form section">
  <h2 class="mb-3">
    @isset($worker) 
      Редактирование записи 
    @else 
      Добавление записи 
    @endisset
  </h2>
  <form
    class="bk-form"
    method="POST"

    @isset($worker)
      action="{{ route('workers.update', $worker) }}"
    @else
      action="{{ route('workers.store') }}"
    @endisset
  >
    @csrf

    <div>
      @isset($worker) 
        @method('PUT') 
      @endisset

      <div class="bk-form__wrapper" data-info="Общие сведения">
        <div class="bk-form__block">

          <!-- /.lastname -->
          <h6 class="bk-form__title">Фамилия</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="lastname"
              type="text"
              name="lastname"
              value="@isset($worker) {{ $worker->lastname }} @endisset"
              placeholder="Введите фамилию"
              required
            />
          </div>

          <!-- /.firstname -->
          <h6 class="bk-form__title">Имя</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="firstname"
              type="text"
              name="firstname"
              value="@isset($worker) {{ $worker->firstname }} @endisset"
              placeholder="Введите имя"
              required
            />
          </div>

          <!-- /.surname -->
          <h6 class="bk-form__title">Отчество</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input bk-valid"
              id="surname"
              type="text"
              name="surname"
              value="@isset($worker) {{ $worker->surname }} @endisset"
              placeholder="Введите отчество"
              required
            />
          </div>

          <!-- /.fio -->
          <input
            class="form-control bk-form__input"
            id="fio"
            type="hidden"
            name="fio"
            value="@isset($worker) {{ $worker->fio }} @endisset"
          />

          <!-- /.position -->
          <h6 class="bk-form__title">Должность</h6>
          <div class="bk-form__field-250 mb-2">
            <select 
              class="form-control bk-form__input"
              id="position_id"
              name="position_id" 
            >
							<option disabled selected>Выберите должность</option>
							@foreach($positions as $position)
							<option 
                value="{{ $position->id }}" 
                @isset($worker) 
                  @if($worker->position_id == $position->id)
								    selected
								  @endif
								@endisset
							>
								{{ ucfirst($position->name) }}
							</option>
							@endforeach
						</select>
          </div>

          <!-- /.slug -->
          <div class="d-flex my-1" style="user-select: none">
            <input type="hidden" name="slug" value="0">
            <input
              class="form-control bk-form__check"
              id="slug"
              type="checkbox"
              name="slug"
              value="1"
              @isset($worker) 
                @if($worker->slug)
                  checked="checked"
                @endif
              @endisset
            />
            <label class="bk-form__label" for="slug">
              доступ к учетной записи
            </label>
          </div>
          
          <!-- /.address -->
          <h6 class="bk-form__title">Адрес</h6>
          <div class="bk-form__field-250 mb-2">
            <input
              class="form-control bk-form__input"
              id="address"
              type="text"
              name="address"
              value="@isset($worker) {{ $worker->address }} @endisset"
              placeholder="Введите адрес"
              required
            />
          </div>

          <!-- /.phone -->
          <h6 class="bk-form__title">Телефон</h6>
          <div class="bk-form__field-250">
            <input
              class="form-control bk-form__input bk-valid"
              id="phone"
              type="text"
              name="phone"
              value="@isset($worker) {{ $worker->phone }} @endisset"
              placeholder="Введите телефон"
              required
            />
          </div>

        </div>
      </div>

      <div class="form-group">
        
        <button 
          class="btn btn-outline-success" 
          id="worker-save"
          type="submit"
        >
          Сохранить
        </button>
        <a 
          class="btn btn-outline-secondary" 
          href="{{ route('workers.index') }}"
        >
          Назад
        </a>
      </div>
    </div>
  </form>
</section>
@endsection
