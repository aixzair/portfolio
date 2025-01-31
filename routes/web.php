<?php

use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
	return redirect()->route('profile.presentation');
})->name('home');

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


// Connexion ---------------------------------------------------------------------------------------

route::get(
	'/login',
	[ConnexionController::class, 'seConnecter']
)->name('login')->middleware('guest');

route::post(
	'/login',
	[ConnexionController::class, 'connexion']
)->name('connexion')->middleware('guest');

route::get(
	'/logout',
	[ConnexionController::class, 'deconnexion']
)->name('logout')->middleware('auth');

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
