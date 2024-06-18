@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

<div id="main-wrapper">

    <div id="categories">
        <div class="btn-round btn-black category-item"><span>Wszystkie</span></div>
        <div class="btn-round category-item"><span>Architektura</span></div>
        <div class="btn-round category-item"><span>Miejskie</span></div>
        <div class="btn-round category-item"><span>Krajobrazy naturalne</span></div>
    </div>
    
    <div id="suggested-wrapper">
        @for ($i = 0; $i < 16; $i++)
        <div class="card-suggested">
            <div class="card-image">
                <img src="{{ asset('img/uploaded/sad_jabloni/thumbnail.jpg') }}" alt="">
            </div>
            <div class="card-details">
                <h3>Sad jabłoni</h3>
                <p class="place-localisation">    
                    <img src="{{ asset('img/icons/map_pin.png') }}" class="map_pin_icon" alt=""> <span>Ciężkowice</span>
                </p>
            </div>
        </div>
        @endfor
    </div>
        
</div>

@endsection