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
        Schema::table('enderecos', function (Blueprint $table) {
            $table->foreignId('contato_id')->constrained('contatos');
        });

        Schema::table('telefones', function (Blueprint $table) {
            $table->foreignId('contato_id')->constrained('contatos');
            $table->foreignId('tipo_telefone_id')->constrained('tipos_telefones');
        });

        Schema::table('categorias_has_contatos', function (Blueprint $table) {
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('contato_id')->constrained('contatos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enderecos', function (Blueprint $table) {
            $table->dropColumn('contato_id');
        });
        Schema::table('telefones', function (Blueprint $table) {
            $table->dropColumn('contato_id');
            $table->dropColumn('tipo_telefone_id');
        });
        Schema::table('categorias_has_contatos', function (Blueprint $table) {
            $table->dropColumn('categoria_id');
            $table->dropColumn('contato_id');
        });
    }
};
