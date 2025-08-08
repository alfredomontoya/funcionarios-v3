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
        Schema::create('gestion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('year', 4);
            $table->string('titulo', 128);
            $table->string('descripcion', 256);
            $table->string('url_file', 256)->nullable();
            $table->integer('count_funcionarios')->default(0);
            $table->boolean('procesado')->default(false);
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion');
    }
};
