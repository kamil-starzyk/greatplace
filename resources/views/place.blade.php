@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endpush

@section('content')

<div id="main-wrapper">
    <div id="gallery">
    
    </div>
    <div>
        <h1>{{$place->name}}</h1>


    </div>
        
</div>

@endsection