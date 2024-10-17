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
        Schema::create('demande_visas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('type_visa_id')->constrained('type_visas')->onDelete('cascade');
            $table->string('destination');
            $table->integer('nb_adultes');
            $table->integer('nb_enfants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_visas');
    }
};
