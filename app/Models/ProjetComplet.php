<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

readonly class ProjetComplet {
	public Projet $details;

	/**
	 * @var Collection|Lien[]
	 */
	public Collection|array $liens;

	/**
	 * @var Collection|Point_travaille[]
	 */
	public Collection|array $points;

	public static function findOrFail(string $id): ProjetComplet {
		$projet = new ProjetComplet();
		$projet->details = Projet::findOrFail($id);
		$projet->liens = Lien::where('pro_id', $id)->get();
		$projet->points = Point_travaille::where('pro_id', $id)->get();

		return $projet;
	}
}
