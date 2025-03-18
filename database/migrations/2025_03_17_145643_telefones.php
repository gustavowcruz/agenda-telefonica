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
        Schema::create("telefones", function (Blueprint $table) {
            $table->id();
            $table->string("numero");
            $table->integer("contato_id")->constrained('contatos');
            $table->integer("tipo_telefone_id")->constrained('tipos_telefones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("telefones");
    }
};
