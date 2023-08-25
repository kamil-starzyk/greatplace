@extends('layouts.app')

@section('content')

  <div class="leaves-background"></div>
  <div class="home">
    <div class="search-box container">
        <p class="slogan active">Znajdź <strong>idealne miejsce</strong> <br>na sesję zdjęciową</p>
        <form class="search-form" action="search_place" method="POST">
          <input type="text" name="search_phrase" class="search-bar" placeholder="Wyszukaj">
          <img src="{{ asset('img/icons/search.png') }}" class="search-icon" alt="">
          <img id="filters-toggler" src="{{ asset('img/icons/filters.png') }}" class="filters-icon" id="filters-icon" alt="">
          
          <div class="filters">
            <div class="button-round">Filtry</div>
            <div class="button-round">Tarnów <i class="las la-angle-down"></i></div>
            <div class="button-round">+40km <i class="las la-angle-down"></i></div>
            <div class="button-round">Popularne</div>
          </div>
        </form>
      </div>
      <div class="content-box">
        <h2>Popularne</h2>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
        <div style="height: 100px; border: 2px solid black">Benc</div>
      </div>
  </div>
@endsection