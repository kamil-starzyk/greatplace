@extends('layouts.app')

@section('content')

  <div class="leaves-background"></div>
  <div class="home">
    <div class="search-box container">
        <p class="slogan">Znajdź <strong>idealne miejsce</strong> <br>na sesję zdjęciową</p>
        <form action="search_place" method="POST">
          <input type="text" name="search_phrase" class="search-bar" placeholder="Wyszukaj">
          <img src="{{ asset('img/icons/search.png') }}" class="search-icon" alt="">
          <img src="{{ asset('img/icons/filters.png') }}" class="filters-icon" id="filters-icon" alt="">
        </form>
      </div>
      <div class="content-box">
        <h2>Popularne</h2>
      </div>
  </div>
@endsection