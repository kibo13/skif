<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <div class="container-fluid px-1">
    <button id="sidebarToggler" class="navbar-btn">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <button
      id="navbarToggler"
      class="navbar-toggler"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
    >
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav d-flex justify-content-end w-100">
        @if(Auth::user()->permissions()->pluck('slug')->contains('user_read'))
        <li @nbactive('user*')>
          <a class="nav-link" href="{{ route('users.index') }}">
            Пользователи
          </a>
        </li>
        @endif

        @if(Auth::user()->permissions()->pluck('info')->contains('1'))
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle pr-3"
            href="#"
            data-toggle="dropdown">
            Информация
          </a>

          <div class="dropdown-menu">
            @if(Auth::user()->permissions()->pluck('slug')->contains('cat_read'))
            <a
              class="dropdown-item"
              href="{{ route('categories.index') }}">
              Категории</a>
            @endif
            @if(Auth::user()->permissions()->pluck('slug')->contains('mat_read'))
            <a
              class="dropdown-item"
              href="{{ route('materials.index') }}">
              Материалы</a>
            @endif
            @if(Auth::user()->permissions()->pluck('slug')->contains('cust_read'))
            <a
              class="dropdown-item"
              href="{{ route('customers.index') }}">
              Клиенты</a>
            @endif
            @if(Auth::user()->permissions()->pluck('slug')->contains('sup_read'))
            <a
              class="dropdown-item"
              href="{{ route('suppliers.index') }}">
              Поставщики</a>
            @endif
          </div>
        </li>
        @endif

        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle pr-3"
            href="#"
            data-toggle="dropdown">
            {{ Auth::user()->worker->fio }}
          </a>

          <div class="dropdown-menu">
            <a
              id="logout-link"
              class="dropdown-item"
              href="{{ route('logout') }}">
              Выйти
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
