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
		Schema::create("ensembles", function(Blueprint $table) {
			$table->id("ens_id");
			$table->string("ens_nom", 50)->nullable(false);
			$table->timestamp('created_at')
				->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')
				->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('ensembles');
	}
};
