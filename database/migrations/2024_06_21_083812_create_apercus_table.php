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
		Schema::create('apercus', function(Blueprint $table) {
			$table->id("ape_id");
			$table->string("ape_image", 100)->nullable();
			$table->unsignedBigInteger("pro_id");
			$table->timestamp('created_at')
				->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')
				->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

			// Clé étrangère
			$table->foreign("pro_id")->references("pro_id")->on("projets")
				->onDelete("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('apercus');
	}
};
