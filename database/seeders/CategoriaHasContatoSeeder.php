<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaHasContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [1,3];
        foreach ($categorias as $categoria) {
            DB::table("categorias_has_contatos")->insert([
                'categoria_id' => $categoria,
                'contato_id' => 1,
            ]);
        }
    }
}
