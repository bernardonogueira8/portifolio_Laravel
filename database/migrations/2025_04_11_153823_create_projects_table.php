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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            // Informações principais
            $table->string('name')->comment('Nome do projeto');
            $table->text('description')->comment('Descrição');
            $table->text('image_path')->comment('Caminho da imagem')->nullable();
            $table->text('url')->comment('URL associada ao projeto');
            $table->string('type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
