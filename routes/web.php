<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddPlaceController;

Route::get('/', function () {
    return view('home');
});
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