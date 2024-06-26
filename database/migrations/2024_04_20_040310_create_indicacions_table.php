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
        Schema::create('indicacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_receta');
            $table->string('descripcion');
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('indicacions');
    }
};
