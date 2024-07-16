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
		Schema::create('projets', function(Blueprint $table) {
			$table->id('pro_id');
			$table->string('pro_nom', 50)->nullable(false)->unique();
			$table->date('pro_date')->nullable(false);
			$table->string('pro_presentation', 200)->nullable(false);
			$table->boolean("pro_image")->nullable(false);
			$table->tinyInteger('pro_nbImage')->nullable(false)->default(0);
			$table->unsignedBigInteger("ens_id")->nullable(false)->default(false);

			// Dates
			$table->timestamp('created_at')
				->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')
				->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

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
