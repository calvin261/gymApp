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
        Schema::create('saluds', function (Blueprint $table) {
            $table->id();
            $table->string("genero");

            $table->float("altura");
            $table->float("peso");
            $table->float("imc");
            $table->string("observaciones")->nullable();
            $table->unsignedBigInteger('client_id')->unique();
            $table->foreign('client_id')->references('id')
                ->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saluds');
    }
};
