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
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_receta');
            $table->string('descripcion');
            $table->timestamps();
            // Llave foranea
            $table->foreign('id_receta')->references('id')->on('recetas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
