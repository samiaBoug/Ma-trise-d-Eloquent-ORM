<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;

// Route::get('/about', function () {
//     return view('about');
// });


// Route::get('/', function () {
//     return view('welcomeApp');
// });

Route::get('/contact', [ContactController::class,'create'])->name('contact.create');
Route::post('/contact', [ContactController::class,'store'])->name('contact.store');