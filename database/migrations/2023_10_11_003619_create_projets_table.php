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
        Schema::disableForeignKeyConstraints();

        Schema::create('projets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nom');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->unsignedInteger('cout_global');
            $table->unsignedInteger('bilan');
            $table->string('status')->default('pending');
            $table->string('owner_type');
            $table->uuid('owner_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
