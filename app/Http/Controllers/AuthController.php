<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController {

	/**
	 * Login
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
	 */
	public function login() {
		return view('authentication.login');
	}

	/**
	 * Post of login
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function loginPost(Request $request) {
		$validated = $request->validate([
			'email' => 'required|email',
			'password' => 'required|string'
		]);

		$success = Auth::attempt([
			'email' => $validated['email'],
			'password' => $validated['password']
		]);

		if (!$success) {
			return back()->withInput()->withErrors([
				'email' => 'Identification échouée.'
			]);
		}

		$request->session()->regenerate();

		return redirect()->intended()
			->with('success', 'Authentification réussie.');
	}

	/**
	 * Logout
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function logout() {
		Auth::logout();
		session()->invalidate();
		session()->regenerateToken();

		return redirect(route('home'))
			->with('success', 'Déconnexion réussie.');
	}
}
