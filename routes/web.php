<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormAddController;

Route::get('/', function () {
    return view('home');
});
Route::get('/add', function () {
    return view('add');
});

Route::get('/add-form', function () {
    return view('add-form');
});
Route::post('/submit-add-form', [FormController::class, 'submitForm']);


Route::get('/regulamin', function () {
    return view('regulamin');
});