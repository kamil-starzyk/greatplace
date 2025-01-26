@extends('profile.profile')


@section('profile-content')

<h1>Twój profil</h1>


<div id="profile-data">

  <img src="{{$profile_picture}}" alt="Zdjęcie profilowe" class="profile-picture">
  <div id="name-and-role">
    <div id="profile-name">{{$user->name}}</div>
    <div class="profile-info-entry">Robert Leszkiewicz</div>
    <div class="profile-info-entry">Fotograf
      <!-- #TODO -->
    </div>
  </div>
  <a href="personal-data" id="edit-data">
    <div class="profile-info-entry">Edytuj Dane</div>
    <img src="{{ asset('img/icons/edit.png') }}" class="edit-image">
  </a>
</div>

<div id="profile-statistics">
  <div class="statistic-element">
    <div class="icon-circle">
      <img src="{{ asset('img/icons/localisation_dark.png') }}">
    </div>
    <div class="statistic-name">
      <a href="my-places">Dodane miejsca</a>
      <!-- #TODO -->
    </div>
    <div class="statistic-count">
      {{ $user->places->count() }} 
    </div>
  </div>
  <div class="statistic-element">
    <div class="icon-circle">
      <img src="{{ asset('img/icons/heart.png') }}">
    </div>
    <div class="statistic-name">
      Polubienia twoich miejsc 
      <!-- #TODO -->
    </div>
    <div class="statistic-count">
      69 
    </div>
  </div>
  <div class="statistic-element">
    <div class="icon-circle">
      <img src="{{ asset('img/icons/eye.png') }}">
    </div>
    <div class="statistic-name">
      Ogólna liczba wyświetleń
    </div>
    <div class="statistic-count">
      420
    </div>
  </div>
</div>


@endsection