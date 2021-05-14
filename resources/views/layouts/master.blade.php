<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>
      ИС формирования и исполнения заказов мебельного цеха предприятия
    </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  </head>
  <body>
    <div id="app" class="wrapper">
      @include('partials.sidebar')
      <main class="main">
        <div id="content" class="content">
          <!-- Navbar -->
          @include('partials.navbar')
          <!-- Content -->
          @yield('content')
          <!-- Footer -->
        </div>
        @include('partials.footer')
      </main>
    </div>

    <!-- START modal-destroy -->
    @include('assets.modals.destroy')
    <!-- END modal-destroy -->

    <!-- START modal-customer -->
    @include('assets.modals.customer')
    <!-- END modal-customer -->
  </body>
</html>
