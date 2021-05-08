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
      <a class="sidebar-link" href="{{ route('customers.index') }}" >
        @include('assets.icons.home') Главная
      </a>
    </li>
    <li @sbactive('order*')>
      <a class="sidebar-link" href="{{ route('customers.index') }}">
        @include('assets.icons.order') Заказы
      </a>
    </li>
    <li @sbactive('customer*')>
      <a class="sidebar-link" href="{{ route('customers.index') }}">
        @include('assets.icons.customer') Клиенты
      </a>
    </li>
    <li @sbactive('worker*')>
      <a class="sidebar-link" href="{{ route('workers.index') }}">
        @include('assets.icons.worker') Сотрудники
      </a>
    </li>
    <li @sbactive('product*')>
      <a class="sidebar-link" href="{{ route('products.index') }}">
        @include('assets.icons.product') Мебель
      </a>
    </li>
  </ul>
  <!-- END Links -->
</nav>
