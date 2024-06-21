<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class
	extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('projets', function(Blueprint $table) {
			$table->id("pro_id");
			$table->string("pro_titre", 50)->nullable(false)->unique();
			$table->date("pro_date_debut")->nullable(false);
			$table->date("pro_date_fin")->nullable();
			$table->string("pro_presentation", 200)->nullable(false);
			$table->string("pro_image")->nullable();
			$table->unsignedBigInteger("ens_id")->nullable();
			$table->timestamps();

			// Clé étrangère
			$table->foreign("ens_id")->references("ens_id")->on("ensembles")
				->onDelete("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('projets');
	}
};
