<nav id="sidebar" class="sidebar">
  <!-- START Logo -->
  <div class="sidebar-header">
    <div class="sidebar-logo logo">
      <img
        class="logo-icon logo-icon--sm"
        src="{{ asset('images/logo.png') }}"
        alt="logo"
      />
      <h5 class="sidebar-logo__title">Информационная система</h5>
    </div>
    <p class="sidebar-header__title">ИС МЦП</p>
  </div>
  <!-- END Logo -->

  <!-- START Links -->
  <ul class="sidebar-list">
    <li @sbactive('home*')>
      <a class="sidebar-link" href="{{ route('home') }}" >
        @include('assets.icons.home') Главная
      </a>
    </li>
    <li @sbactive('worker*')>
      <a class="sidebar-link" href="{{ route('workers.index') }}">
        @include('assets.icons.user-group') Сотрудники
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="">
        @include('assets.icons.database') Клиенты
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="">
        @include('assets.icons.bookmark-alt') Мебель
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="">
        @include('assets.icons.document-report') Отчеты
      </a>
    </li>
  </ul>
  <!-- END Links -->
</nav>
