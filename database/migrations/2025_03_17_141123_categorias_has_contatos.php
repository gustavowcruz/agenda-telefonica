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
        Schema::create("categorias_has_contatos", function (Blueprint $table) {
            $table->id();
            $table->integer("categoria_id")->constrained('categorias');
            $table->integer("contato_id")->constrained('contatos');

            //$table->primary(['categoria_id','contato_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("categorias_has_contatos");
    }
};
