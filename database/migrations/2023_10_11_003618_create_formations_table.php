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

        Schema::create('formations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('libelle');
            $table->unsignedInteger('montant_inscription');
            $table->unsignedInteger('montant_frais');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->longText('description');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
