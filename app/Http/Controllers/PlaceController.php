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

    public function destroy($id)
    {

        $place = Place::findOrFail($id);
        $place_name = $place->name;

        $place->delete();

        return redirect()->back()->with('success', 'Udało Ci się usunąć miejsce:'.$place_name.'!');   
    }

    public function edit($id){
        $place = $place = Place::with(['tags', 'images'])->findOrFail($id);
        return view('edit-form', ["place" => $place]);
    }
}
