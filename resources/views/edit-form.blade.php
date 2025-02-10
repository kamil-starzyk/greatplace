@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/add.css') }}">
@endpush

@section('content')

<div id="app">
    <!-- <three-step-form></three-step-form> -->
    {{ json_encode($place) }}
</div>
<script src="{{ mix('resources/js/app.js') }}" type="module"></script>

@endsection