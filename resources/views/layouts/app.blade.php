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

      <div class="columns">
        <div class="column is-2">
          <aside class="menu is-hidden-mobile">
            <div class="menu-user">
              <div class="columns">
                <img src="/img/64x64.png" alt="">
                <div class="column">
                  <p>Welcome, </p>
                  <span>{{ Auth::user()->name }}</span>
                </div>
              </div>
            </div>
            <p class="menu-label">
              General
            </p>
            <ul class="menu-list">
              <li><a href="/hospital">Hospitals</a></li>
              <li><a href="/patient">Patients</a></li>
              <li><a href="/supplier">Suppliers</a></li>
            </ul>
            <p class="menu-label">
              Administration
            </p>
            <ul class="menu-list">
              <li>
                <a href="/change/password">
                  <span class="icon is-small">
                    <i class="fa fa-key"></i>
                  </span>
                  <span>
                    Change Password
                  </span>
                </a>
              </li>
              <li>
                <a href="/database">
                  <span class="icon is-small">
                    <i class="fa fa-database"></i>
                  </span>
                  <span>
                    Database
                  </span>
                </a>
              </li>
            </ul>
            <p class="menu-label">
              Transactions
            </p>
            <ul class="menu-list">
              <li><a>Payments</a></li>
              <li><a>Transfers</a></li>
              <li><a>Balance</a></li>
            </ul>
          </aside>
        </div>
        <div class="column" style="padding-bottom: 0">
          <nav class="nav has-shadow">
            <div class="container">
              <div class="nav-left">
                <a href="/" class="nav-item">
                  <!-- <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo"> -->
                  HMS
                </a>
              </div>
              <span class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
              </span>
              @if(Auth::check())
                <div class="nav-right nav-menu">
                  <a href="{{ route('logout') }}" class="nav-item is-tab logout"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              @endif
            </div>
          </nav>
          <div class="main">
            @yield('content')
          </div>
        </div>
      </div>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
  @stack('scripts')
</body>
</html>
