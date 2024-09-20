<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddPlaceController;
use App\Http\Controllers\PlaceController;

Route::get('/', [PlaceController::class, 'all']);

Route::get('/place/{id}', [PlaceController::class, 'show'])->name('place.show');

Route::get('/add', function () {
    return view('add');
});

Route::get('/add-form', function () {
    return view('add-form');
});
Route::post('/submit-add-form', [AddPlaceController::class, 'submitForm']);


Route::get('/regulamin', function () {
    return view('regulamin');
});