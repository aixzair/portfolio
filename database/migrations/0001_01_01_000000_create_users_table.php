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
		Schema::create('utilisateurs', function(Blueprint $table) {
			$table->id('uti_id');
			$table->string('uti_mail')->unique();
			$table->timestamp('uti_email_verified_at')->nullable();
			$table->string('uti_mdp');
			$table->rememberToken();
			$table->timestamps();
		});

		Schema::create('password_reset_tokens', function(Blueprint $table) {
			$table->string('prt_email')->primary();
			$table->string('prt_token');
			$table->timestamp('created_at')->nullable();
		});

		Schema::create('sessions', function(Blueprint $table) {
			$table->string('prt_id')->primary();
			$table->foreignId('uti_id')->nullable()->index();
			$table->string('ip_address', 45)->nullable();
			$table->text('user_agent')->nullable();
			$table->longText('payload');
			$table->integer('last_activity')->index();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('utilisateurs');
		Schema::dropIfExists('password_reset_tokens');
		Schema::dropIfExists('sessions');
	}
};
