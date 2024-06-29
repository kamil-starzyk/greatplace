<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  @stack('styles')
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <div id="logo">
      <a href="/">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </a>
    </div>
    <nav>
      <ul class="main_links">
        <li class="nav_item"><a href="/"><img src="{{ asset('img/icons/polecane.png') }}" alt="ikona polecane"> Polecane</a></li>
        <li class="nav_item"><a href="add"><img src="{{ asset('img/icons/dodaj.png') }}" alt="ikona dodaj"> Dodaj</a></li>
        <li class="nav_item"><a href=""><img src="{{ asset('img/icons/konto.png') }}" alt="ikona konto"> Konto</a></li>
      </ul>
    </nav>
    <div id="search_user_group">
      <div id="search">
        <form class="search-form" action="search_place" method="POST">
          <input type="text" name="search_phrase" class="search-bar" placeholder="Wyszukaj">
          <img src="{{ asset('img/icons/search.png') }}" class="search-icon" alt="">
        </form>    
      </div>
        
      <div id="user">
        
        @include('partials.authenticated_user')

      </div>
    </div>
    
  </header>
  <main>
      @yield('content')
  </main>

  <footer>
      <!-- Footer Content -->
  </footer>

</body>
</html>