<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-btn" id="sidebarCollapse">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

    <!-- <button
      class="navbar-toggler"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="{{ __('Toggle navigation') }}"
    >
      <span class="navbar-toggler-icon"></span>
    </button> -->

    {{ Auth::user()->name }}

    <div>
      <a
        id="logout-link"
        class="dropdown-item bk-navbar__link"
        href="{{ route('logout') }}"
      >
        Выйти
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
      </form>
    </div>

    <div class="bk-navbar collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="bk-navbar__list navbar-nav d-flex justify-content-end w-100">
        <!-- /.info -->

        <li class="nav-item dropdown">
          <a
            id="navbarDropdown"
            class="nav-link dropdown-toggle bk-navbar__info pr-3"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            v-pre
          >
            {{ Auth::user()->name }}
            <span class="caret"></span>
          </a>
          <!-- /.show-user -->

          <div
            class="bk-navbar__dropitem dropdown-menu dropdown-menu-right p-0"
            aria-labelledby="navbarDropdown"
          >
            <a
              id="logout-link"
              class="dropdown-item bk-navbar__link"
              href="{{ route('logout') }}"
            >
              Выйти
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
            <!-- /.logout -->
          </div>
        </li>
        <!-- /.btn-logout -->
      </ul>
    </div>
  </div>
</nav>
