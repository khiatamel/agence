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
        Schema::create('program_voyages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('voyage');
            $table->string('program');
            $table->foreign('voyage')->references('id')->on('voyage_hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_voyages');
    }
};
