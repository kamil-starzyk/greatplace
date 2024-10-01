@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endpush

@section('content')

<div id="main-wrapper">
    
    <div id="place_photos">
        <div id="big_image">
            <img src="{{ Storage::url($place->images[0]->path) }}" class="photo" alt="">
        </div>
        <div id="small_images">
        <img src="{{ Storage::url($place->images[1]->path) }}" class="photo" alt="">
        <img src="{{ Storage::url($place->images[2]->path) }}" class="photo" alt="">
        </div>
        @if (count($place->images) > 3)
            <button id="dark_circle" onclick="openGallery()">
                + {{count($place->images) - 3}}
            </button>
        @endif
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
        

    <div id="gallery" style="display: none">
        <gallery-component :photos='@json($place->images->map(fn($image) => Storage::url($image->path)))'></gallery-component>
    </div>
    <script src="{{ mix('resources/js/gallery.js') }}" type="module"></script>
    <script>
        function openGallery() {
            const galleryElement = document.getElementById('gallery');
            if (galleryElement) {
                galleryElement.style.display = 'block';
            }
        }
        function closeGallery() {
            const galleryElement = document.getElementById('gallery');
            if (galleryElement) {
                galleryElement.style.display = 'none';
            }
        }
    </script>

</div>

@endsection