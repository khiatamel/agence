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
        Schema::create('omras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->string('type');
            $table->date('depart');
            $table->date('retour');
            $table->number('place');
            $table->number('saison');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('omras');
    }
};
