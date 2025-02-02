<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('link', function (Blueprint $table) {
            $table->foreign(['pro_id'], 'liens_pro_id_foreign')->references(['pro_id'])->on('project')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('link', function (Blueprint $table) {
            $table->dropForeign('liens_pro_id_foreign');
        });
    }
};
