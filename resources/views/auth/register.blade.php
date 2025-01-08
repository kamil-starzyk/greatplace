@extends('auth.auth')


@section('auth-content')

<h1>Zarejestruj się</h1>
<p>Witaj na Greatplace! Podaj swoje dane, aby w pełni korzystać z serwisu.</p>
<div id="form-inner-box">
  <form method="POST" action="{{ route('register') }}">
    @csrf
    
    <div id="name-input" class="input-div">
      <div class="input-label">
        Login
      </div>
      <input type="text" class="basic-input" id="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
      @if ($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
      @endif
    </div>

    <div id="email-input" class="input-div">
      <div class="input-label">
        Email
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
      <input type="password" class="basic-input" id="password" name="password" required autocomplete="new-password">
      @if ($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
      @endif
    </div>

    <div id="password_confirmation-input" class="input-div">
      <div class="input-label">
        Powtórz hasło
      </div>
      <input type="password" class="basic-input" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
      @if ($errors->has('password_confirmation'))
        <div class="error">{{ $errors->first('password_confirmation') }}</div>
      @endif
    </div>

    <input type="submit" class="btn-round btn-black btn-big " value="Zarejestruj się">
  </form>
</div>

@endsection