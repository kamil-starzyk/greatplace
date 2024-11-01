@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')

<div id="main-box">

  
  <div id="form-box">
    @yield('auth-content')
  </div>
  <div id="picture-box">
    <img src="{{ asset('img/auth_tree.jpg') }}" alt="">
  </div>
  
</div>

@endsection