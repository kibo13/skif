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
    @if(Auth::user()->permissions()->pluck('slug')->contains('home'))
    <li @sbactive('home*')>
      <a class="sidebar-link" href="{{ route('home') }}" >
        @include('assets.icons.home') Главная
      </a>
    </li>
    @endif
    @if(Auth::user()->permissions()->pluck('slug')->contains('emp_read'))
    <li @sbactive('worker*')>
      <a class="sidebar-link" href="{{ route('workers.index') }}">
        @include('assets.icons.worker') Сотрудники
      </a>
    </li>
    @endif
    @if(Auth::user()->permissions()->pluck('slug')->contains('order_read'))
    <li @sbactive('order*')>
      <a class="sidebar-link" href="{{ route('orders.index') }}">
        @include('assets.icons.order') Заказы
      </a>
    </li>
    @endif
    @if(Auth::user()->permissions()->pluck('slug')->contains('furn_read'))
    <li @sbactive('product*')>
      <a class="sidebar-link" href="{{ route('products.index') }}">
        @include('assets.icons.product') Мебель
      </a>
    </li>
    @endif 
    @if(Auth::user()->permissions()->pluck('slug')->contains('store_read'))
    <li @sbactive('move*')>
      <a class="sidebar-link" href="{{ route('movements.index') }}">
        @include('assets.icons.store') Склад
      </a>
    </li>
    @endif 
    @if(Auth::user()->permissions()->pluck('slug')->contains('buy_read'))
    <li @sbactive('purch*')>
      <a class="sidebar-link" href="{{ route('purchases.index') }}">
        @include('assets.icons.shop') Закупки
      </a>
    </li>
    @endif
  </ul>
  <!-- END Links -->
</nav>
