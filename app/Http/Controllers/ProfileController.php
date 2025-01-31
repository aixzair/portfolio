<?php

namespace App\Http\Controllers;

class ProfileController
	extends BaseController {

	/**
	 * Show my presentation
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
	 */
	public function presentation() {
		return view('profile.presentation');
	}

	/**
	 * Show my contacts
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
	 */
	public function contacts() {
		return view('profile.contacts');
	}
}