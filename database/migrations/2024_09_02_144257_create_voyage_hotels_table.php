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
        Schema::create('voyage_hotels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('voyage');
            $table->integer('hotel');
            $table->foreign('voyage')->references('id')->on('voyage_organises')->onDelete('cascade');
            $table->foreign('hotel')->references('nom')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyage_hotels');
    }
};
