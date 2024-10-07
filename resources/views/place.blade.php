@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endpush

@section('content')

<div id="main-wrapper">
    
    <div id="place_photos">
        <gallery-component 
            :images='@json($place->images->map(fn($image) => [
                "photo" => Storage::url($image->path),
                "thumbnail" => Storage::url($image->thumbnail)
            ]))'
        ></gallery-component>
    </div>

    <div id="place_details">
        <h1>{{$place->name}}</h1>
        <p>{{$place->description}}</p>
        <div id="tags">
            <span><strong>Tagi: </strong></span>
            @foreach ($place->tags as $tag)
                <span class="tag">{{$tag->name}}</span>
            @endforeach
        </div>
        <hr>
        <div id="place_info">
            <div class="info_box">
                <div class="image_circle">
                    <img src="{{ asset('img/icons/localisation_dark.png') }}" alt="">
                </div>
                <div class="info_text">
                    <h4>Lokalizacja</h4>
                    <strong>{{$place->locality}}, {{$place->voivodeship}}</strong>
                </div>
            </div>
            <div class="info_box">
                <div class="image_circle">
                    <img src="{{ asset('img/icons/earth_dark.png') }}" alt="">
                </div>
                <div class="info_text">
                    <h4>Współrzędne</h4>
                    <strong>{{$place->latitude}} {{$place->longitude}}</strong>
                </div>
            </div>
            <div class="info_box">
                <div class="image_circle">
                    <img src="{{ asset('img/icons/picture_dark.png') }}" alt="">
                </div>
                <div class="info_text">
                    <h4>Dostępność</h4>
                    <strong>{{$place->getSeasonsString()}}</strong>
                </div>
            </div>
            <div class="info_box">
                <div class="image_circle">
                    <img src="{{ asset('img/icons/map_dark.png') }}" alt="">
                </div>
                <div class="info_text">
                    <h4>Dojazd do lokalizacji</h4>
                    <strong>{{$place->ease_of_access}}</strong>
                </div>
            </div>
        </div>


    </div>
        
    <script src="{{ mix('resources/js/gallery.js') }}" type="module"></script>
    

</div>

@endsection