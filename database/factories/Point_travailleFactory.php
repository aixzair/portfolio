<?php

namespace Database\Factories;

use App\Models\Point_travaille;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Point_travaille>
 */
class Point_travailleFactory
	extends Factory {

	protected $model = Point_travaille::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [
			'poi_nom' => $this->faker->text(50),
			'poi_definition' => $this->faker->text(200),
			'pro_id' => -1
		];
	}
}
