<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/contacts', function () {
	return view('general/contacts');
})->name("contacts");

Route::get('/projets', function () {
	return view('projet/index');
})->name("projet.index");
