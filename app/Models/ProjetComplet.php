<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class ProjetComplet {
	public Projet $details;
	public Collection $liens;
	public Collection $points;

	public static function findOrFail(string $id): ProjetComplet {
		$projet = new ProjetComplet();
		$projet->details = Projet::findOrFail($id);
		$projet->liens = Lien::where('pro_id', $id)->get();
		$projet->points = Point_travaille::where('pro_id', $id)->get();

		return $projet;
	}
}
