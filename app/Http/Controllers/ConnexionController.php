<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class ConnexionController
	extends Controller {

	public function seConnecter() {
		return view('connexion/seConnecter');
	}

	public function connexion(Request $request) {
		$request->validate([
			'email' => 'required|email',
			'mdp' => 'required|string'
		]);

		$reussie = Auth::attempt([
			'email' => $request->input('email'),
			'password' => $request->input('mdp')
		]);

		if (!$reussie) {
			return back()->withInput()->withErrors([
				'email' => 'Identification échouée.'
			]);
		}

		$request->session()->regenerate();
		return redirect()->intended();
	}

	public function deconnexion() {
		// TODO
	}
}