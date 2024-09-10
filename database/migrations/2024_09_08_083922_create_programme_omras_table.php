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
        Schema::create('programme_omras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('départ');
            $table->time('heurD');
            $table->string('parcourtD');
            $table->string('nvD');
            $table->date('retour');
            $table->time('heurR');
            $table->string('parcourtR');
            $table->string('nvR');
            $table->string('compagne');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programme_omras');
    }
};
