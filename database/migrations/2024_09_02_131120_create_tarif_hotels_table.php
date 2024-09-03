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
        Schema::create('tarif_hotels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('condition');
            $table->string('hotel');
            $table->foreign('hotel')->references('nom')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_hotels');
    }
};
