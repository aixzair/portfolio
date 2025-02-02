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
        Schema::table('tool', function (Blueprint $table) {
            $table->foreign(['pro_id'], 'fk_tool_project')->references(['pro_id'])->on('project')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tool', function (Blueprint $table) {
            $table->dropForeign('fk_tool_project');
        });
    }
};
