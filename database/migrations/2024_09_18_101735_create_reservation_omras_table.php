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
        Schema::create('reservation_omras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('group_name')->nullable();
            $table->string('nom');
            $table->string('numero');
            $table->string('passeport');
            $table->string('photo');
            $table->integer('age')->nullable();
            $table->string('hotel');
            $table->string('statut')->default('en cours de traitement');
            $table->foreignId('omraID')->constrained('omra_hotels'); // Ensure 'omra_hotels' table exists
            $table->foreignId('user_id')->constrained('users'); // Ensure 'users' table exists
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_omras');
    }
};
