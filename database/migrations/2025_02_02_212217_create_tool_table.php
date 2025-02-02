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
        Schema::create('tool', function (Blueprint $table) {
            $table->bigInteger('too_id', true);
            $table->string('too_label', 50);
            $table->unsignedBigInteger('pro_id')->index('fk_tool_project');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool');
    }
};
