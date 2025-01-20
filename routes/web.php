<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddPlaceController;
use App\Http\Controllers\PlaceController;


Route::get('/', [PlaceController::class, 'all'])->name('home');

Route::get('/place/{id}', [PlaceController::class, 'show'])->name('place.show');


Route::get('/regulamin', function () {
    return view('regulamin');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile-overview', [ProfileController::class, 'overview'])->name('profile-overview');
    Route::get('/personal-data', [ProfileController::class, 'edit'])->name('personal-data');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add', function () {
        return view('add');
    });
    Route::get('/add-form', function () {
        return view('add-form');
    });

    // Route::get('personal-data', function () {
    //     return view('profile.personal-data');
    // });

    Route::post('/submit-add-form', [AddPlaceController::class, 'submitForm']);
});

require __DIR__.'/auth.php';