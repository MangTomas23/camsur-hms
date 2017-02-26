<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bower_components/bulma/css/bulma.css">
    <link rel="stylesheet" href="/css/styles.css">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
  <nav class="nav has-shadow">
    <div class="container">
      <div class="nav-left">
        <a href="/" class="nav-item">
          <!-- <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo"> -->
          HMS
        </a>
      </div>
    </div>
  </nav>
  @yield('content')
  <!-- Scripts -->

  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
