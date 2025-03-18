<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classificacoes = ['Amigo','Vizinho','Parente'];
        foreach($classificacoes as $classificacao) {
            DB::table("categorias")->insert([
            "classificacao" => $classificacao
            ]);
        }
    }
}
