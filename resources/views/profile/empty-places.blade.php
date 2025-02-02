@extends('profile.profile')


@section('profile-content')

<h1>Twoje miejsca</h1>

<div id="no-places-container">
  <img src="{{ asset('img\no_places.png') }}" alt="">
  <span>Nie dodałeś jeszcze żadnego miejsca</span>
  <a href="add-form" class="btn-round btn-black btn-big"><span>Dodaj miejsce</span></a>
</div>



@endsection