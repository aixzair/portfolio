<?php

namespace App\Http\Controllers;

use App\Models\Point_travaille;
use App\Models\Projet;
use App\Models\ProjetComplet;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProjetController
	extends BaseController {

	/**
	 * Store a newly created resource in storage.
	 */
	/*public function store(Request $request) {
		//
	}*/

	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return view("projet/index", [
			"projets" => Projet::all()
		]);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id) {
		return view("projet/show", [
			"projet" => ProjetComplet::findOrFail($id)
		]);
	}

	public function edit(string $id) {
		return view("projet/edit", [
			"projet" => ProjetComplet::findOrFail($id)
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id) {
		$projet = ProjetComplet::findOrFail($id);
		$request->validate([
			'date' => 'required|date',
			'presentation' => 'required|string|max:200',
			'titre' => 'required|string|max:50',
			'points.*.nom' => 'nullable|string|max:50',
			'points.*.description' => 'nullable|string|max:200'
		]);

		try {
			$projet->details->update([
				'pro_date' => $request->input('date'),
				'pro_presentation' => $request->input('presentation'),
				'pro_titre' => $request->input('titre')
			]);

			// Gère les points
			$points = $request->input('points', []);
			foreach ($points as $point) {
				$nom = $point['nom'] ?? null;
				if ($nom == null) {
					continue;
				}
				$description = $point['description'] ?? null;

				$id = $point['data_id'] ?? false;
				if ($id) {
					$pointTravaille = Point_travaille::find($id);
					if ($pointTravaille) {
						if (($point['suppr'] ?? 'false') === 'true') {
							// Suppréssion
							Point_travaille::destroy($id);
						} else {
							// Mis à jour
							$pointTravaille->update([
								'poi_nom' => $nom,
								'poi_definition' => $point['suppr'] ?? '?',
							]);
						}
					}
				} else {
					// Création
					Point_travaille::create([
						'poi_nom' => $nom,
						'poi_definition' => $description,
						'pro_id' => $projet->details->pro_id
					]);
				}
			}

		} catch (QueryException) {
			return redirect()->back()->withErrors([
				'error' => 'Une erreur est survenue lors de la mise à jour du projet. Veuillez réessayer.'
			])->withInput();
		} catch (Exception) {
			return redirect()->back()->withErrors([
				'error' => 'Une erreur inattendue est survenue. Veuillez réessayer.'
			])->withInput();
		}

		return redirect()
			->route('projet.show', $projet->details->pro_id)
			->with('success', 'Projet mis à jour avec succès');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	/*public function destroy(string $id) {
		//
	}*/
}

/*
<!--
    'definitions.*.name' => 'nullable|string|max:255',
    'definitions.*.value' => 'nullable|string|max:255',
]);

    // Mettre à jour les définitions
    $projet->definitions = $request->input('definitions', []);
    $projet->save();
-->


*/
