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
            <select name="city" id="" class="button-round">
              <option value="tarnow">Tarnów</option>
              <option value="krakow">Kraków</option>
              <option value="kasna">Kąśna</option>
              <option value="tuchow">Tuchów</option>
              <option value="biecz">Biecz</option>
            </select>
            <select name="radius" id="" class="button-round">
              <option value="2"> +2km </option>
              <option value="5"> +5km </option>
              <option value="10"> +10km </option>
              <option value="15"> +15km </option>
              <option value="25"> +25km </option>
              <option value="40"> +40km </option>
            </select>
            <div class="button-round pressable" id="popular-button">Popularne</div>
          </div>
        </form>
      </div>
      <div class="content-box">
        <h2 style="margin-bottom: 14px">Popularne</h2>
        <div class="categories">
          <div class="button-round pressable">Plener</div>
          <div class="button-round pressable">Wewnątrz</div>
          <div class="button-round pressable">Miasto</div>
          <div class="button-round pressable">W studiu</div>
        </div>
        <div class="propositions">
          <div class="roller-wrap">
            <div class="roller-body">
              <div class="roller-card">
                <img src="{{ asset('img/uploaded_photos/rzepak.jpeg') }}" alt="pole rzepaku">
                <h5>Pole Rzepaku</h5>
                <div class="city-n-likes">
                  <span><i class="las la-map-marker"></i>Tarnów</span>
                  <span class="right-span"><span class="likes-counter">45</span> <i class="las la-heart"></i></span>
                </div>
              </div>
              <div class="roller-card">
                <img src="{{ asset('img/uploaded_photos/jabloni.jpeg') }}" alt="pole rzepaku">
                <h5>Sad Jabłoni</h5>
                <div class="city-n-likes">
                  <span><i class="las la-map-marker"></i>Tuchów</span>
                  <span class="right-span"><span class="likes-counter">23</span> <i class="las la-heart"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection