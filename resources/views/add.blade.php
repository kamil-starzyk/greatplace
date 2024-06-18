@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/add.css') }}">
@endpush

@section('content')

<div id="main-wrapper">

    <div id="main-box">
        <img src="{{ asset('img\add_page_picture.png') }}" alt="obraz dwójki ludzi wieszających obraz na ścianie" class="obraz-ludzi">
        <h2 class="dodaj-miejsce">Dodaj interesujące miejsce</h2>
        <p class="przeslij-lokalizacje">Prześlij lokalizacje i zdjęcia ciekawego miejsca, które świetnie sprawdzi się podczas sesji fotograficznej</p>
        <a href="add-form" class="btn-round btn-black przycisk"><span>Dodaj miejsce</span></a>
    </div>
        
</div>

@endsection