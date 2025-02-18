<?php

namespace App\Http\Controllers;

use App\Managers\ProjetComplet;
use App\Models\Lien;
use App\Models\Point_travaille;
use App\Models\Projet;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProjectController
	extends BaseController {

	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return view("project.index", [
			"projets" => Projet::all()
		]);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id) {
		return view("project.show", [
			"projet" => ProjetComplet::findOrFail($id)
		]);
	}

	public function edit(string $id) {
		return view("project.edit", [
			"projet" => ProjetComplet::findOrFail($id)
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id) {
		$projet = ProjetComplet::findOrFail($id);
		$request->validate([
			'nom' => 'required|string|max:50',
			'date' => 'required|date',
			'imageCarte' => 'required|in:0,1',
			'presentation' => 'required|string|max:200',
			'liens.*.nom' => 'nullable|string|max:100',
			'liens.*.destination' => 'nullable|string|max:100',
			'points.*.nom' => 'nullable|string|max:50',
			'points.*.description' => 'nullable|string|max:200'
		]);

		try {
			// Met à jour le projet
			$projet->details->update([
				'pro_nom' => $request->input('nom'),
				'pro_presentation' => $request->input('presentation'),
				'pro_date' => $request->input('date'),
				'pro_image' => $request->input('imageCarte') == '1',
			]);

			// Gère les liens
			foreach ($request->input('liens') ?? [] as $lien) {
				$lienId = $lien['id'] ?? false;
				$lienSuppression = ($lien['suppression'] ?? '0') === '1';
				$lienNom = $lien['nom'] ?? null;
				$lienDestination = $lien['destination'] ?? null;

				if ($lienNom == null || $lienDestination == null) {
					continue;
				} elseif ($lienId) {
					$lienBdd = Lien::find($lienId);
					if ($lienBdd) {
						if ($lienSuppression) {
							Lien::destroy($lienId);
						} else {
							$lienBdd->update([
								'lien_nom' => $lienNom,
								'lien_destination' => $lienDestination
							]);
						}
					}
				} else {
					Lien::create([
						'lien_nom' => $lienNom,
						'lien_destination' => $lienDestination,
						'pro_id' => $id
					]);
				}
			}

			// Gère les points
			foreach ($request->input('points', []) ?? [] as $point) {
				$pointId = $point['id'] ?? false;
				$pointSuppression = ($point['suppression'] ?? '0') === '1';
				$pointNom = $point['nom'] ?? null;
				$pointDescription = $point['description'] ?? null;

				if ($pointNom == null) {
					continue;
				} elseif ($pointId) {
					$pointTravaille = Point_travaille::find($pointId);
					if ($pointTravaille) {
						if ($pointSuppression) {
							Point_travaille::destroy($pointId);
						} else {
							$pointTravaille->update([
								'poi_nom' => $pointNom,
								'poi_definition' => $pointDescription,
							]);
						}
					}
				} else {
					Point_travaille::create([
						'poi_nom' => $pointNom,
						'poi_definition' => $pointDescription,
						'pro_id' => $id
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
			->route('project.show', $projet->details->pro_id)
			->with('success', 'Projet mis à jour avec succès.');
	}
}