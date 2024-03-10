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
        Schema::create('rutinas', function (Blueprint $table) {
            $table->id();
            $table->String("Nombre");
            $table->String("Lunes")->nullable();
            $table->String("Martes")->nullable();
            $table->String("Miercoles")->nullable();
            $table->String("Jueves")->nullable();
            $table->String("Viernes")->nullable();
            $table->String("Sabado")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutinas');
    }
};
