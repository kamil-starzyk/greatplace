<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }}</title>
</head>
<body>
  <header>

    @if(auth()->check())
      @include('partials.authenticated_user')
    @else
      @include('partials.guest_user')
    @endif
    
  </header>
  <main>
      @yield('content')
  </main>

  <footer>
      <!-- Footer Content -->
  </footer>

</body>
</html>