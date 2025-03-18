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
        for ($i =0; $i < 2; $i++){
            DB::table("categorias_has_contatos")->insert([
                'categoria_id' => rand(1,2),
                'contato_id' => rand(1,2)
            ]);
        }
    }
}
