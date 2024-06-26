<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class
	extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		DB::unprepared(file_get_contents(database_path('sql/insert.sql')));
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void { }
};
