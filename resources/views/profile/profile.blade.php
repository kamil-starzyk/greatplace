@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@php

@endphp

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
    <div id="other-links">
      <ul>
        <li id="collapsible" onclick="toggleCollapsible(this)">
          <span>Twój profil</span>
          <img src="{{ asset('img/icons/simple_arrow.png') }}" id="nav-arrow" alt="ikona dodaj"> <!-- Collapsible icon -->
        </li>
        <div class="collapsible-content" style="display: block;">
          <li><a href="#">Dane osobowe</a></li>
          <li class="grey"><a href="#">Logowanie i bezpieczeństwo</a></li>
          <li class="grey"><a href="#">Powiadomienia</a></li>
          <li class="grey"><a href="#">Ulubione miejsca</a></li>
          <li class="grey"><a href="#">Punkty</a></li>
        </div>
        <li><a href="#">Polityka prywatności</a></li>
        <li><a href="#">Regulamin</a></li>
        <li><a href="#">Ustawienia</a></li>
        <li><a href="#">Pomoc</a></li>
        <li><a href="#">O Greatplace</a></li>
      </ul>
    </div>
  </div>
  <div id="profile-content">
    @yield('profile-content')
  </div>
  
</div>

<script>
  function toggleCollapsible(element) {
    const content = element.nextElementSibling;
    content.style.display = content.style.display === "block" ? "none" : "block";
    var arrow = document.getElementById('nav-arrow');
    arrow.classList.toggle("rotated");
  }
</script>

@endsection