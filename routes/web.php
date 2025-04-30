<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\AuthController;

// Dashboard and Artwork Pages
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/our-works', function () {
    return view('our-works');
})->name('our-works');

Route::get('/recent-clients', function () {
    return view('recent-clients');
})->name('recent-clients');

Route::get('/clay-works', function () {
    return view('works.clay-works');
})->name('clay-works');

Route::get('/wall-paintings', function () {
    return view('works.wall-paintings');
})->name('wall-paintings');

Route::get('/cement-works', function () {
    return view('works.cement-works');
})->name('cement-works');

Route::get('/pandals', function () {
    return view('works.pandals');
})->name('pandals');

Route::get('/others', function () {
    return view('works.others');
})->name('others');

Route::get('/pastel', function () {
    return view('works.pastel');
})->name('pastel');

Route::get('/water', function () {
    return view('works.water');
})->name('water');

// Authentication Routes
Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/custom-login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', function () {
    return view('auth.logout');
})->name('logout');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');



// Query Submission
Route::post('/query/submit', [QueryController::class, 'submit'])->name('query.submit');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
