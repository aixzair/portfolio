<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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

// ProjectController
Route::name('project.')->group(function() {
	// Index
	Route::get(
		"/projects",
		[ProjectController::class, "index"]
	)->name("index");

	// Show
	Route::get(
		"/project/{id}",
		[ProjectController::class, "show"]
	)->name("show");

	// Edit
	Route::get(
		"/project/edit/{id}",
		[ProjectController::class, "edit"]
	)->middleware('auth')
		->name("edit");

	// Update
	Route::put(
		"/project/update/{id}",
		[ProjectController::class, "update"]
	)->middleware('auth')
		->name("update");
});
