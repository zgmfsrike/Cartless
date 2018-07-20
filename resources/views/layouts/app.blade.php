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

  <style type="text/css">

  html{
    background-color: #F0F0F0;
  }

  .uk-navbar-container:not(.uk-navbar-transparent){
    background-color: #DDDDDDDD;
    max-height: 80px;
    z-index: 980;
  }

  .product-image{
    max-width: 500px;
    max-height: 500px;
  }

  .logo-image{
    margin-top: 50px;
    max-height: 140px;
    z-index: 980;
  }

  </style>

</head>
<body class="background-gray">
  <div id="app">
    <div class="" style="margin-bottom: -30px; z-index: 980;" uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
      <nav class="uk-navbar-container uk-margin" uk-navbar="mode: click">
        <div class="uk-navbar-left">
          <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="{{route('home')}}" class="uk-text-bold">{{ __('CART') }}<sub>{{ __('less') }}</sub></a></li>
            @if(Auth::user() && Auth::user()->is_staff == 1)
            <li class="uk-active"><a href="{{route('product-list-staff')}}">Product List</a></li>
            @else
            <li class="uk-active"><a href="{{route('product-list-customer')}}">Product List</a></li>
            @endif
          </ul>
        </div>

        <div class="uk-navbar-center">
          <a href="{{route('home')}}">
            <img src="/image/logo/logo.png" alt="" class="logo-image uk-border-circle">
            <div uk-dropdown><h3 class="uk-text-danger">บ๊อบบี้แนะนำ</h3></div>
          </a>
        </div>

        <div class="uk-navbar-right">
          <ul class="uk-navbar-nav">
            @guest
            <li class="uk-active"><a href="/login">{{ __('Login') }}</a></li>
            <li class="uk-active"><a href="/register">{{ __('Register') }}</a></li>
            @else
            @if(Auth::user() && Auth::user()->is_staff == 0)
            <li class="uk-active"><a href="/cart"><span uk-icon="icon: cart"></span> Shopping cart</a></li>
            @endif
            <li class="uk-active"><a onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              @endguest
            </ul>
          </div>
        </nav>
      </div>

      <main class="uk-container">
        @yield('content')
      </main>
    </div>
  </body>
  </html>
