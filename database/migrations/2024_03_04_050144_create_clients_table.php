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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("telefono");
            $table->string("correo");
            $table->string("fechaNacimiento");
            $table->string("direccion");
            $table->string("provincia");
            $table->string("ciudad");
            $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->bigInteger('rutina_id')->unsigned()->nullable();
            $table->foreign('rutina_id')->references('id')->on('rutinas')->onDelete('cascade');
            // Agregar la clave foránea para la relación con usuarios
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
