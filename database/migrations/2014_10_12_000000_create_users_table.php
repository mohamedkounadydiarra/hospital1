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
            $table->string('nom');
            $table->string('prenom');
            $table->longText('photo');
            $table->string('email')->unique();
            $table->date('datenaiss');
            $table->string('telephone');
            $table->string('password');
            $table->string('taille')->nullable();
            $table->integer('poid')->nullable();
            $table->string('role');
            $table->unsignedBigInteger('idspecialite')->nullable()->references('id')->on('specialite')->onDelete('set null');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
