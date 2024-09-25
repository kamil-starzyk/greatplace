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
            <div id="dark_circle">
                + {{count($place->images) - 3}}
            </div>
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
            <div class="info_elemet">
                ...
            </div>
        </div>


    </div>
        
</div>

@endsection