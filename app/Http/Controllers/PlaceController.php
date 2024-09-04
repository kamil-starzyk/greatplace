<?php

namespace App\Http\Controllers;

use App\Models\Place;

use Illuminate\Http\Request;

class PlaceController extends Controller
{
    function show(){
        $places = Place::paginate(20);
        return view("home", ["places" => $places]);
    }
}
