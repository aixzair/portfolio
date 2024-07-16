<?php

namespace Database\Factories;

use App\Models\Lien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lien>
 */
class LienFactory
	extends Factory {

	protected $model = Lien::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [
			'lien_nom' => $this->faker->text(100),
			'lien_destination' => $this->faker->text(100),
			'pro_id' => -1
		];
	}
}
