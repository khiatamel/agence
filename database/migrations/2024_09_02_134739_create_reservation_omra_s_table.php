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
            $table->number('numero');
            $table->file('passeport');
            $table->file('photo');
            $table->number('age');
            $table->string('statut');
            $table->string('omra');
            $table->foreign('omra')->references('omra')->on('omra_hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_o_s');
    }
};
