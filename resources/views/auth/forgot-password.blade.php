@extends('auth.auth')

@section('auth-content')

<h1>Zapomniałeś hasła?</h1>
<p> Żaden problem. Po prostu podaj nam swój adres e-mail, a my wyślemy Ci link do resetowania hasła, który pozwoli Ci wybrać nowe.</p>
<div id="form-inner-box">
  <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div id="email-input" class="input-div">
      <input type="text" class="basic-input" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
      @if ($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
      @endif
    </div>
    
    <input type="submit" class="btn-round btn-black btn-big " value="Wyślij link">
    
  </form>
</div>

@endsection