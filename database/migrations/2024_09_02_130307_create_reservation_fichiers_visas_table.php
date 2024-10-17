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
        Schema::create('reservation_fichiers_visas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_personne_id')->constrained('reservation_personnes_visas')->onDelete('cascade'); // Related to 'reservation_personnes' table
            $table->foreignId('dossier_visa_id')->constrained('dossier_visas')->onDelete('cascade'); // Related to the specific dossier (visa requirement)
            $table->string('fichier'); // File path or name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_fichiers_visas');
    }
};
