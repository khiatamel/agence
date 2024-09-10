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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();  // Utiliser le téléphone au lieu de l'email
            $table->timestamp('phone_verified_at')->nullable();  // Colonne pour vérifier le téléphone
            $table->string('password');
            $table->string('role')->default('client');
            $table->string('verification_code')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        $table->dropColumn('phone_verified_at');
        $table->dropColumn('verification_code');
    }
};
