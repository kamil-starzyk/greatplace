@extends('profile.profile')


@section('profile-content')

<h1>Edycja danych</h1>

<form method="post" action="{{ route('profile.update') }}">

<div id="profile-photo">
  <profile-photo :initial-picture="'{{ $user->profile_picture }}'">
  
  </profile-photo>
</form>



@endsection