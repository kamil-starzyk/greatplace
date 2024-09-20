<?php

namespace App\Http\Controllers;

use App\Models\Place;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
    function all(){
        $places = Place::paginate(20);
        return view("home", ["places" => $places]);
    }

    function show($id){
        $place = Place::findOrFail($id);
        return view('place', ["place" => $place]);
    }
}
