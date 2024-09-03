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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom')->unique();
            $table->string('adresse');
            $table->string('desc');
            $table->boolean('petit_dejeuner');
            $table->boolean('demi_pension');
            $table->boolean('pension_complete');
            $table->boolean('all_inclusive');
            $table->boolean('all_insoft');
            $table->boolean('vue_mer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
