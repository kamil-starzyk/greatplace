@extends('profile.profile')


@section('profile-content')

<h1>Twój profil</h1>


<div id="profile-data">

  <img src="{{$profile_picture}}" alt="Zdjęcie profilowe" class="profile-picture">
  <div id="name-and-role">
    <div id="profile-name">{{$user->name}}</div>
    <div class="profile-info-entry">Robert Leszkiewicz</div>
    <div class="profile-info-entry">Fotograf #TODO</div>
  </div>
  <a href="personal-data" id="edit-data">
    <div class="profile-info-entry">Edytuj Dane</div>
    <img src="{{ asset('img/icons/edit.png') }}" class="edit-image">
  </a>
</div>


@endsection