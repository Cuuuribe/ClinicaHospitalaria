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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del paciente
            $table->string('email')->unique(); // Email del paciente
            $table->string('phone')->nullable(); // Teléfono del paciente
            $table->date('birth_date')->nullable(); // Fecha de nacimiento
            $table->text('address')->nullable(); // Dirección
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
