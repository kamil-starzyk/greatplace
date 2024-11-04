@extends('auth.auth')


@section('auth-content')

<h1>Zaloguj się</h1>
<p>Witaj na Greatplace! Podaj swoje dane do logowania</p>
<div id="form-inner-box">
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="text" class="basic-input" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
    <input type="password" class="basic-input" id="password" name="password" required autocomplete="current-password">
    <input type="submit" class="btn-round btn-black btn-big " value="Zaloguj się">
    <a href="{{ route('password.request') }}" id="forgot-password">Nie pamiętasz hasła? </a>
  </form>
</div>

@endsection