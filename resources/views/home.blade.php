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
        @foreach ($places as $place)
        <div class="card-suggested">
            <div class="card-image">
                <img src="{{ Storage::url($place->images[0]->path) }}" alt="Place Image">
            </div>
            <div class="card-details">
            <h3>
                <a href="{{ route('place.show', ['id' => $place->id]) }}">
                    {{$place->name}}
                </a>
            </h3>
                <p class="place-localisation">    
                    <img src="{{ asset('img/icons/map_pin.png') }}" class="map_pin_icon" alt=""> <span>{{$place->locality}}</span>
                </p>
            </div>
        </div>
        @endforeach
    </div>
        
</div>

@endsection