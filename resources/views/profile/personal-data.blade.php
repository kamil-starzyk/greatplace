@extends('profile.profile')


@section('profile-content')

<h1>Edycja danych</h1>

<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
@csrf
@method('patch')
  <div id="profile-photo">
    <profile-photo :initial-picture="'{{ $user->profile_picture ? Storage::url($user->profile_picture) : '' }}'">
    </profile-photo>
  </div>
  <div class="profile_input">
    <label for="name">Nazwa użytkownika:</label>
    <input type="text" id="name" name="name" class="basic-input" value="{{ old('name', $user->name) }}">
  </div>
  <div class="profile_input">
    <label for="name">Adres email:</label>
    <input type="text" id="email" name="email" class="basic-input" value="{{ old('email', $user->email) }}">
  </div>
  <div class="profile_input">
    <label for="name">Nt. telefonu:</label>
    <input type="text" id="telephone" name="telephone" class="basic-input" value="{{ old('telephone', $user->telephone) }}">
  </div>

  <input type="reset" class="left_button btn-round btn-big">
  <input type="submit" class="right_button btn-round btn-black btn-big">
</form>

<h2>Zmień hasło</h2>

<form method="post" action="{{ route('password.update') }}">
@csrf
@method('put')
  <div class="profile_input">
    <label for="current_password">Obecne hasło</label>
    <input type="password" id="current_password" name="current_password"  class="basic-input">
  </div>

  <div class="profile_input">
    <label for="update_password">Nowe hasło</label>
    <input type="password" id="update_password" name="password" class="basic-input">
  </div>

  <div class="profile_input">
    <label for="update_password_confirmation">Powtórz hasło</label>
    <input type="password" id="update_password_confirmation" name="password_confirmation" class="basic-input">
  </div>

  <input type="reset" class="left_button btn-round btn-big">
  <input type="submit" class="right_button btn-round btn-black btn-big">

</form>

<h2>Usuń konto</h2>
<div id="delete-user">
  <!--<delete-user></delete-user>-->
  <form method="post" action="{{ route('profile.destroy') }}" id="delete-user-form" class="p-6" onSubmit="return confirm('Na pewno chcesz usunąć konto?');">
  @csrf
  @method('delete')
    <h2>Czy na pewno chcesz usunąć konto?</h2>
    <div class="profile_input">
      <label for="delete_user_confirmation">Wpisz hasło aby potwierdzić, że chcesz permanentnie usunąć konto</label>
      <input type="password" id="delete_user_confirmation" name="password" class="basic-input">
    </div>
    <input type="submit" class="left_button btn-round btn-red btn-big" value="Usuń konto">
  </form>
</div>

<!-- <script>
  console.log("LOG");
  document.getElementById("delete-user-form").addEventListener(
    "submit",
    function(event){
      if (confirm("Na pewno chcesz usunąć konto?") !== true){
        console.log("LOG2");
        event.preventDefault()
      }
    },
    false
  );
</script> -->

@endsection