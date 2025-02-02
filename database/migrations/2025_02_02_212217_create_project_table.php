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
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('pro_id');
            $table->string('pro_name', 50)->unique('projets_pro_nom_unique');
            $table->smallInteger('pro_year')->nullable();
            $table->string('pro_summary', 200);
            $table->boolean('pro_picture');
            $table->tinyInteger('pro_nbPicture')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
