<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>ИС "Скиф" мебельного производства</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  </head>
  <body>
    <div id="app" class="wrapper">
      @include('includes.sidebar')
      <div id="content" class="content">
        @include('includes.navbar') @yield('content')
        @include('includes.footer')
      </div>
    </div>
  </body>
</html>
