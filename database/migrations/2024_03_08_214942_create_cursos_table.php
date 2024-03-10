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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->json('horario')->nullable();
            $table->unsignedBigInteger('entrenador_id');
            $table->foreign('entrenador_id')->references('id')->on('entrenadores');
            $table->timestamps();
        });

        Schema::create('curso_cliente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_cliente');
        Schema::dropIfExists('cursos');
    }
};
