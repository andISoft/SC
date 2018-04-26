<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-param" content="_token">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta property="og:type" content="website" />

  <link rel="shortcut icon" href="/img/favicon.ico">

  <title>{{ config('app.name', 'ChaguaFarma') }}</title>

  <!-- Styles -->
  <link href="{{ mix('css/admin/app.css') }}" rel="stylesheet">
  @stack('css')

  <script>
  window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token() ]) !!};
  </script>

</head>
<body>
  <div class="" id="app">
    @yield('content')
  </div>

  <!-- Scripts -->
  <script src="{{ mix('js/admin/app.js') }}"></script>
  @stack('js')
</body>
</html>
