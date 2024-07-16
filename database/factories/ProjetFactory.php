<?php

namespace Database\Factories;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Projet>
 */
class ProjetFactory
	extends Factory {

	protected $model = Projet::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [
			'pro_nom' => $this->faker->name(),
			'pro_date' => $this->faker->date(),
			'pro_presentation' => $this->faker->text(),
			'pro_image' => false
		];
	}
}
