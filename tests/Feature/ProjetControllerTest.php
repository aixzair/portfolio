<?php

namespace Tests\Feature;

use App\Managers\ProjetComplet;
use App\Models\Lien;
use App\Models\Point_travaille;
use App\Models\Projet;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;
use Tests\TestCase;

class ProjetControllerTest
	extends TestCase {

	/**
	 * Test de l'affichage des projets
	 *
	 * @return void
	 */
	public function test_index(): void {
		Projet::factory()->create();
		$nbProjets = Projet::count();

		$reponse = $this->get(route('projet.index'));
		$crawler = new Crawler($reponse->getContent());

		// Test
		$reponse->assertStatus(200);
		$this->assertCount($nbProjets, $crawler->filter('div.card'));
	}

	/**
	 * Test l'ajout d'un lien et d'un point
	 *
	 * @return void
	 */
	public function test_update_add(): void {
		DB::beginTransaction();
		try {
			// Création des données
			$projet = Projet::factory()->create();

			// Ajout d'un lien et d'un point travaillé
			$reponse = $this->put(route('projet.update', $projet->pro_id), [
				'nom' => $projet->pro_nom,
				'date' => '2024-01-01',
				'imageCarte' => '0',
				'presentation' => $projet->pro_presentation,
				'liens' => [
					[
						'nom' => 'testLien',
						'destination' => 'lienDestination'
					]
				],
				'points' => [
					[
						'nom' => 'testPoint',
						'description' => 'pointDescription'
					]
				],
			]);

			// Test de la redirection
			$reponse->assertRedirect(route('projet.show', $projet->pro_id));
			$reponse->assertSessionHas('success', 'Projet mis à jour avec succès.');

			$projetComplet = ProjetComplet::findOrFail($projet->pro_id);

			// Test add lien
			$this->assertCount(1, $projetComplet->liens);
			$lien = $projetComplet->liens->first();
			$this->assertEquals('testLien', $lien->lien_nom);
			$this->assertEquals('lienDestination', $lien->lien_destination);

			// Test add point
			$this->assertCount(1, $projetComplet->points);
			$point = $projetComplet->points->first();
			$this->assertEquals('testPoint', $point->poi_nom);
			$this->assertEquals('pointDescription', $point->poi_definition);
		} finally {
			DB::rollBack();
		}
	}

	/**
	 * Test la mise à jour d'un projet
	 *
	 * @return void
	 */
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
		} finally {
			DB::rollBack();
		}
	}

	/**
	 * Test de suppression d'un lien et d'un point
	 *
	 * @return void
	 */
	public function test_update_delete(): void {
		DB::beginTransaction();
		try {
			// Création des données
			$projet = Projet::factory()->create();
			$lien = Lien::factory()->create([
				'pro_id' => $projet->pro_id
			]);
			$point = Point_travaille::factory()->create([
				'pro_id' => $projet->pro_id
			]);

			// Ajout d'un lien et d'un point travaillé
			$reponse = $this->put(route('projet.update', $projet->pro_id), [
				'nom' => $projet->pro_nom,
				'date' => '2024-01-01',
				'imageCarte' => '0',
				'presentation' => $projet->pro_presentation,
				'liens' => [
					[
						'id' => $lien->lien_id,
						'nom' => $lien->lien_nom,
						'destination' => $lien->lien_destination,
						'suppression' => '1'
					]
				],
				'points' => [
					[
						'id' => $point->poi_id,
						'nom' => $point->poi_nom,
						'description' => $point->poi_definition,
						'suppression' => '1'
					]
				],
			]);

			// Test de la redirection
			$reponse->assertRedirect(route('projet.show', $projet->pro_id));
			$reponse->assertSessionHas('success', 'Projet mis à jour avec succès.');

			// Test des suppressions
			$projetComplet = ProjetComplet::findOrFail($projet->pro_id);
			$this->assertCount(0, $projetComplet->liens);
			$this->assertCount(0, $projetComplet->points);
		} finally {
			DB::rollBack();
		}
	}
}
