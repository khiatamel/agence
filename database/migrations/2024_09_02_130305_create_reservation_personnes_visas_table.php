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
        Schema::create('reservation_personnes_visas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('reservations_visas')->onDelete('cascade'); // Related to 'reservations' table
            $table->string('nom'); // Optional: Name of the person (or unique identifier)
            $table->enum('status', ['en attente', 'approuvé', 'rejetée'])->default('en attente'); // Status column
            $table->decimal('prix', 8, 2)->nullable(); // Prix column (can be filled by the admin)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_personnes_visas');
    }
};
