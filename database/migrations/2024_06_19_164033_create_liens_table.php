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
		Schema::create('liens', function(Blueprint $table) {
			$table->id("lien_id");
			$table->string("lien_contenu", 100)->nullable();
			$table->unsignedBigInteger("pro_id")->nullable(false);
			$table->timestamps();

			// Clé étrangère
			$table->foreign("pro_id")->references("pro_id")->on("projets")
				->onDelete("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('liens');
	}
};
