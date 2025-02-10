@extends('profile.profile')


@section('profile-content')

<h1>Twoje miejsca</h1>

<div id="places-container">

@foreach ($places as $place)

<div class="place-entry">
  <img src="{{ Storage::url($place->images[0]->thumbnail) }}" alt="Place Image">
  <div class="place-details">
    <a href="{{ route('place.show', ['id' => $place->id]) }}" class="place-name">{{$place->name}}</a>
    <p class="place-localisation">    
      <img src="{{ asset('img/icons/map_pin.png') }}" class="map_pin_icon" alt=""> 
      <span>{{$place->locality}}</span>
    </p>
  </div>
  <div class="buttons">
    <div class="delete-place">
      <form method="post" action="{{ route('place.destroy', $place->id) }}" onSubmit="return confirm('Na pewno chcesz usunąć to miejsce? To działanie jest nieodwracalne');">        
      @csrf
      @method('delete')
        <button type="submit" >
          <img src="{{ asset('img/icons/trash_can_light.png') }}" alt="Usuń">
        </button>
      </form>
    </div>
  </div>
  <a href="{{ route('place.edit', ['id' => $place->id]) }}" class="edit-place"><img src="{{ asset('img/icons/edit.png') }}" alt="Edytuj"></a>
</div>


@endforeach

</div>



@endsection