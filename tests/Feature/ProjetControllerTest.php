<?php

namespace Tests\Feature;

use App\Models\Lien;
use App\Models\Point_travaille;
use App\Models\Projet;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Tests\TestCase;

class ProjetControllerTest
	extends TestCase {

	public function test_index(): void {
		// TODO
		$response = $this->get('/');

		$response->assertStatus(200);
	}

	public function test_show(): void { } // TODO

	public function test_edit(): void { } // TODO

	public function test_update(): void {
		// TODO add
		// TODO edit
		// TODO delete
	}

	public function test_update_edit(): void {
		DB::beginTransaction();
		try {
			// Création des données
			$projet = Projet::factory()->create([
				'pro_nom' => 'defaut',
				'pro_date' => '2023-01-01',
				'pro_presentation' => 'defaut',
				'pro_image' => false,
				'pro_nbImage' => 0
			]);
			$lien = Lien::factory()->create([
				'lien_nom' => 'defaut',
				'lien_destination' => 'defaut',
				'pro_id' => $projet->pro_id
			]);
			$point = Point_travaille::factory()->create([
				'poi_nom' => 'defaut',
				'poi_definition' => 'defaut',
				'pro_id' => $projet->pro_id
			]);

			// Mise à jour des données
			$reponse = $this->put(route('projet.update', $projet->pro_id), [
				'nom' => 'proNom',
				'date' => '2024-01-01',
				'imageCarte' => '1',
				'presentation' => 'proPresentation',
				'liens' => [
					[
						'id' => $lien->lien_id,
						'nom' => 'lienNom',
						'destination' => 'lienDestination'
					]
				],
				'points' => [
					[
						'id' => $point->poi_id,
						'nom' => 'pointNom',
						'description' => 'pointDescription'
					]
				],
			]);

			// Test de la recirection
			$reponse->assertRedirect(route('projet.show', $projet->pro_id));
			$reponse->assertSessionHas('success', 'Projet mis à jour avec succès.');

			// Test maj Projet
			$projet->refresh();
			$this->assertEquals('proNom', $projet->pro_nom);
			$this->assertEquals('2024-01-01', $projet->pro_date);
			$this->assertEquals('proPresentation', $projet->pro_presentation);
			$this->assertEquals(1, $projet->pro_image);

			// Test maj lien
			$lien->refresh();
			$this->assertEquals('lienNom', $lien->lien_nom);
			$this->assertEquals('lienDestination', $lien->lien_destination);

			// Test maj point
			$point->refresh();
			$this->assertEquals('pointNom', $point->poi_nom);
			$this->assertEquals('pointDescription', $point->poi_definition);
		} catch (Exception $exception) {
			throw $exception;
		} finally {
			DB::rollBack();
		}
	}
}
