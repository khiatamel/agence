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
        Schema::create('voyage_organises', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('transport');
            $table->string('destination');
            $table->date('depart');
            $table->date('retour');
            $table->string('photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyage_organises');
    }
};
