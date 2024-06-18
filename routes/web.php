<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormAddController;

Route::get('/', function () {
    return view('home');
});
Route::get('/add', function () {
    return view('add');
});
Route::get('/add-form-1', [FormAddController::class, 'showStep1'])->name('add-form-1');
Route::post('/add-form-1', [FormAddController::class, 'postStep1']);
