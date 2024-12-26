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

  <input type="reset" id="left_button" class="btn-round btn-big">
  <input type="submit" id="right_button" class="btn-round btn-black btn-big">
</form>



@endsection