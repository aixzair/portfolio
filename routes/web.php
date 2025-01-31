<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
	return redirect()->route('profile.presentation');
})->name('home');

// Authentification
Route::get('/login', [AuthController::class, 'login'])
	->middleware('guest')
	->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])
	->middleware('guest')
	->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])
	->middleware('auth')
	->name('logout');

// ProfileController
Route::name('profile.')->group(function() {
	// Presentation
	Route::get(
		'/profile/presentation',
		[ProfileController::class, 'presentation']
	)->name('presentation');

	// Contacts
	Route::get(
		'/profile/contacts',
		[ProfileController::class, 'contacts']
	)->name('contacts');
});

// Projets -----------------------------------------------------------------------------------------

Route::get(
	"/projets",
	[ProjetController::class, "index"]
)->name("projet.index");

Route::get(
	"/projet/{id}",
	[ProjetController::class, "show"]
)->name("projet.show");

Route::get(
	"/projet/edit/{id}",
	[ProjetController::class, "edit"]
)->name("projet.edit");

Route::put(
	"/projet/update/{id}",
	[ProjetController::class, "update"]
)->name("projet.update");
