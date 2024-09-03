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
        Schema::create('reserve_visas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->string('prenom');
            $table->number('num');
            $table->integer('id_dossier');
            $table->string('statut');
            $table->foreign('id_dossier')->references('id')->on('dossier_visas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserve_visas');
    }
};
