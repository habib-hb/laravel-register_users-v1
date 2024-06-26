<?php

use App\Http\Controllers\HahaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

// Getting the current user name
$current_user = auth()->user();



    return view('welcome', ['user' => $current_user]);



});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/haha', [HahaController::class , 'all_hahas']);



Route::post('/haha/store', [HahaController::class , 'haha_store'])->name('haha');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
