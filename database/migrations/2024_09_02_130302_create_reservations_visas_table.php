<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reservations_visas', function (Blueprint $table) {
        $table->id(); // Auto-incrementing ID
        $table->foreignId('user_id')->constrained('users'); // Ensure 'users' table exists
        $table->foreignId('demande_visa_id')->constrained('demande_visas')->onDelete('cascade'); // Foreign key to 'demande_visas'
        $table->integer('total_personnes'); // Number of people in the reservation
        $table->timestamps(); // Timestamps for created_at and updated_at
    });
}

public function down()
{
    Schema::dropIfExists('reservations_visas');
}
};
