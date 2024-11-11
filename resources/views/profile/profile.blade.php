@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')

<div id="main-box">

  <div id="profile-nav">
    <div id="profile-places-switch">
      <ul class="main_links">
        <li class="nav_item">
          <a href="/" class="active"><img src="{{ asset('img/icons/user_dark.png') }}" alt="ikona polecane"> Twoje konto</a>
        </li>
        <li class="nav_item">
          <a href="/add"><img src="{{ asset('img/icons/saved_places_light.png') }}" alt="ikona dodaj"> Zapisane miejsca</a>
        </li>
      </ul>
    </div>
  </div>
  <div id="profile-content">
    @yield('profile-content')
  </div>
  
</div>

@endsection