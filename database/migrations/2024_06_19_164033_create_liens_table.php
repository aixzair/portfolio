<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class
	extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('liens', function(Blueprint $table) {
			$table->id("lien_id");
			$table->string("lien_nom", 100)->nullable(false);
			$table->string("lien_destination", 100)->nullable(false);

			// Dates
			$table->timestamp('created_at')
				->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')
				->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

			// Clé étrangère
			$table->unsignedBigInteger("pro_id")->nullable(false);
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
