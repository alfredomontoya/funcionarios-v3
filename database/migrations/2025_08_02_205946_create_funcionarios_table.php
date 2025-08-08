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
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->integer('nro')->nullable();
            $table->integer('nroedificio')->nullable();
            $table->string('ci');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('cargo')->nullable();
            $table->string('edificio')->nullable();
            $table->string('responsable')->nullable();
            $table->string('telresponsable')->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->tinyInteger('entregado')->default(0);
            $table->timestamps();
            $table->bigInteger('gestion_id')->unsigned()->default(1);
            $table->foreign('gestion_id')->references('id')->on('gestion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionario');
    }
};
