<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.9/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.9/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.9/js/uikit-icons.min.js"></script>

</head>
<body>
  <div id="app">
    <nav class="uk-navbar-container uk-margin" uk-navbar="mode: click">
      <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
          <li class="uk-active"><a href="#">{{ __('CARTless') }}</a></li>
          @if(Auth::user() && Auth::user()->is_staff == 1)
          <li><a href="{{route('product-list-staff')}}">Product List</a></li>
          @else
          <li><a href="{{route('product-list-customer')}}">Product List</a></li>
          @endif

          <li><a href="#">{{ __('Product List') }}</a></li>
        </ul>
      </div>

      <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
          @guest
          <li><a href="/login">{{ __('Login') }}</a></li>
          <li><a href="/register">{{ __('Register') }}</a></li>
          @else
          <li><a href="/cart"><span uk-icon="icon: cart"></span></a></li>
          <li><a onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            @endguest
          </ul>
        </div>
      </nav>

      <main class="uk-container">
        @yield('content')
      </main>
    </div>
  </body>
  </html>
