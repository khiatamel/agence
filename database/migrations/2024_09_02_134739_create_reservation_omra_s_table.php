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
            $table->integer('age');
            $table->string('statut')->default('en cours d\'examen');
            $table->unsignedBigInteger('omraID');
            $table->foreign('omraID')->references('id')->on('omra_hotels')->onDelete('cascade');
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
