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
        Schema::create("enderecos", function (Blueprint $table) {
            $table->id();
            $table->string("logradouro");
            $table->integer("numero")->nullable();
            $table->string("cidade");
            $table->foreignId('contato_id')->constrained('contatos');
        });

        Schema::create("telefones", function (Blueprint $table) {
            $table->id();
            $table->string("numero");
            $table->integer("contato_id")->constrained('contatos');
            $table->integer("tipo_telefone_id")->constrained('tipos_telefones');
        });

        Schema::create("categorias_has_contatos", function (Blueprint $table) {
            $table->id();
            $table->integer("categoria_id")->constrained('categorias');
            $table->integer("contato_id")->constrained('contatos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
        Schema::dropIfExists('telefones');
        Schema::dropIfExists('categorias_has_contatos');
    }
};
