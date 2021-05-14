<div
  class="modal fade"
  id="new-customer"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true" >

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Новый клиент</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('home.basket.customer') }}" method="POST">
        @csrf

        <div class="modal-body" style="padding: 5px 10px;">
          <div class="bk-form__block">

            <!-- /.type_customer -->
            <h6 class="bk-form__title">Тип клиента</h6>
            <ul class="bk-radio mb-2">
              <li class="bk-radio__item">
                <input
                  class="bk-radio__toggle"
                  type="radio"
                  name="type_id"
                  id="1"
                  value="1"
                   >
                <label class="bk-radio__label" for="1" >
                  Физическое лицо
                </label>
              </li>
              <li class="bk-radio__item">
                <input
                  class="bk-radio__toggle"
                  type="radio"
                  name="type_id"
                  id="2"
                  value="2" >
                <label class="bk-radio__label" for="2" >
                  Юридическое лицо
                </label>
              </li>
            </ul>

            <!-- /.code -->
            <h6 id="subject-title" class="bk-form__title">ИИН</h6>
            <div class="bk-form__field-250 mb-2">
              <input
                class="form-control bk-form__input bk-valid @error('code') is-invalid @enderror"
                id="price"
                type="text"
                name="code"
                value=""
                minlength="12"
                maxlength="12"
                placeholder="Введите ИИН"
                required
              />

              @error('code')
              <span class="bk-form__alert invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <!-- /.individual -->
            <div id="individual-block">
              <!-- /.lastname -->
              <h6 class="bk-form__title">Фамилия</h6>
              <div class="bk-form__field-250 mb-2">
                <input
                  class="form-control bk-form__input bk-valid"
                  id="lastname"
                  type="text"
                  name="lastname"
                  value="@isset($customer) {{ $customer->lastname }} @endisset"
                  placeholder="Введите фамилию"
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
                  value="@isset($customer) {{ $customer->firstname }} @endisset"
                  placeholder="Введите имя"
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
                  value="@isset($customer) {{ $customer->surname }} @endisset"
                  placeholder="Введите отчество"
                />
              </div>
            </div>

            <!-- /.entity -->
            <div id="entity-block" class="d-none">
              <h6 class="bk-form__title">Наименование организации</h6>
              <div class="bk-form__field-250 mb-2">
                <input
                  class="form-control bk-form__input"
                  id="name"
                  type="text"
                  name="name"
                  value="@isset($customer) {{ $customer->name }} @endisset"
                  placeholder="Введите наименование"
                />
              </div>
            </div>

            <!-- /.email -->
            <h6 class="bk-form__title">Электронная почта</h6>
            <div class="bk-form__field-250 mb-2">
              <input
                class="form-control bk-form__input @error('email') is-invalid @enderror"
                id="email"
                type="email"
                name="email"
                value="@isset($customer) {{ $customer->email }} @endisset"
                placeholder="Введите почту"
                required
              />

              @error('email')
              <span class="bk-form__alert invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <!-- /.address -->
            <h6 class="bk-form__title">Адрес</h6>
            <div class="bk-form__field-250 mb-2">
              <input
                class="form-control bk-form__input"
                id="address"
                type="text"
                name="address"
                value="@isset($customer) {{ $customer->address }} @endisset"
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
                value="@isset($customer) {{ $customer->phone }} @endisset"
                placeholder="Введите телефон"
                required
              />
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button
            class="btn btn-outline-success mr-0"
            type="submit" >
            Сохранить
          </button>
          <button
            class="btn btn-outline-secondary"
            type="button"
            data-dismiss="modal" >
            Отмена
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
