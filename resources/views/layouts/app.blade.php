<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="{{ (\Request::route()->getName() == 'home') ? 'body-home':'' }}">
  <header>
    <div id="logo">
      <img src="{{ asset('img/logo.png') }}" alt="App Logo">
    </div>
  </header>

  <main class="py-4">
    @yield('content')
  </main>

  <nav>
    <a href="/" class="main-link">
      @if(Route::is('home') )
        <img src="{{ asset('img/icons/home_active.png') }}" alt="">
        <span class="active">Główna</span>
        @else
        <img src="{{ asset('img/icons/home.png') }}" alt="">
        <span>Główna</span>
      @endif
    </a>
    <a href="recommended" class="main-link">
      @if(Route::is('recommended') )
        <img src="{{ asset('img/icons/recommended_active.png') }}" alt="">
        <span class="active">Polecane</span>
      @else
        <img src="{{ asset('img/icons/recommended.png') }}" alt="">
        <span>Polecane</span>
      @endif
    </a>
    <a href="add" class="main-link">
      @if(Route::is('add') )
        <img src="{{ asset('img/icons/add_active.png') }}" alt="">
        <span class="active">Dodaj</span>
      @else
        <img src="{{ asset('img/icons/add.png') }}" alt="">
        <span>Dodaj</span>
      @endif
    </a>
    <a href="account" class="main-link">
      @if(Route::is('account') )
        <img src="{{ asset('img/icons/account_active.png') }}" alt="">
        <span class="active">Konto</span>
      @else
        <img src="{{ asset('img/icons/account.png') }}" alt="">
        <span>Konto</span>
      @endif
    </a>
  </nav>
  
</body>
</html>