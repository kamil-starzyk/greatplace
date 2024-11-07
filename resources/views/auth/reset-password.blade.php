@extends('auth.auth')

@section('auth-content')

<h1>Ustaw nowe hasło</h1> 
<p>Wprowadź nowe hasło poniżej, aby zabezpieczyć swoje konto. Pamiętaj, aby użyć silnego hasła, które będzie trudne do odgadnięcia.</p>
<div id="form-inner-box">
  <form method="POST" action="{{ route('password.store') }}">
    @csrf


    <input type="hidden" name="token" value="{{ $request->route('token') }}">


    <div id="email-input" class="input-div">
      <input type="text" class="basic-input" id="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
      @if ($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
      @endif
    </div>

    <div id="password-input" class="input-div">
      <input type="password" class="basic-input" id="password" name="password" required autocomplete="current-password">
      @if ($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
      @endif
    </div>

    <div id="password_confirmation-input" class="input-div">
      <input type="password" class="basic-input" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
      @if ($errors->has('password_confirmation'))
        <div class="error">{{ $errors->first('password_confirmation') }}</div>
      @endif
    </div>
    
    <input type="submit" class="btn-round btn-black btn-big " value="Wyślij link">
    
  </form>
</div>

@endsection