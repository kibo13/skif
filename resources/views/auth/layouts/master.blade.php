<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
    <div id="app" class="auth">
      <main>@yield('content')</main>
      @include('includes.footer')
    </div>
  </body>
</html>
