@extends('profile.profile')


@section('profile-content')

<h1>Edycja danych</h1>

@php
$profile_picture = '';
if ($user->profile_picture)
{
  $profile_picture = Storage::url($user->profile_picture);
}

@endphp
<img src="{{$profile_picture}}" alt="Zdjęcie profilowe" class="profile-picture">



@endsection