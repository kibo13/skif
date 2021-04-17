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
        <li @nbactive('user*')>
          <a class="nav-link" href="{{ route('users.index') }}"> 
            Пользователи 
          </a>
        </li>

        <!-- <li class="nav-item dropdown mr-2">
          <a
            id="navbarDropdown"
            class="nav-link dropdown-toggle pr-3"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            v-pre
          >
            Информация
          </a>

          <div
            class="dropdown-menu dropdown-menu-right p-0"
            aria-labelledby="navbarDropdown"
          >
            <a class="dropdown-item" href="#"> Отделы </a>

            <a class="dropdown-item" href="#"> Участки </a>

            <a class="dropdown-item" href="#"> Предприятия </a>

            <a class="dropdown-item" href="#"> Адреса </a>

            <a class="dropdown-item" href="#"> Неисправности </a>
          </div>
        </li> -->

        <li class="nav-item dropdown">
          <a
            id="navbarDropdown"
            class="nav-link dropdown-toggle pr-3"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            v-pre
          >
            {{ Auth::user()->worker->fio }}
          </a>

          <div
            class="dropdown-menu dropdown-menu-right p-0"
            aria-labelledby="navbarDropdown"
          >
            <a
              id="logout-link"
              class="dropdown-item"
              href="{{ route('logout') }}"
            >
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
