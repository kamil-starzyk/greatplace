@extends('auth.auth')


@section('auth-content')

<h1>Zaloguj się</h1>
<p>Witaj na Greatplace! Podaj swoje dane do logowania</p>
<div id="form-inner-box">
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div id="email-input" class="input-div">
    <div class="input-label">
        Login
      </div>
      <input type="text" class="basic-input" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
      @if ($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
      @endif
    </div>

    <div id="password-input" class="input-div">
      <div class="input-label">
        Hasło
      </div>
      <input type="password" class="basic-input" id="password" name="password" required autocomplete="current-password">
      @if ($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
      @endif
    </div>
    <input type="submit" class="btn-round btn-black btn-big " value="Zaloguj się">
    <a href="{{ route('password.request') }}" id="forgot-password">Nie pamiętasz hasła? </a>
  </form>
  <a href="{{ route('register') }}" id="registration-link">Nie masz konta? Zarejestruj się.</a>
</div>

@endsection