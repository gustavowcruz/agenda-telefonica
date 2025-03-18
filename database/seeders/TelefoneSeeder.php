<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numeros = ['79 8122-0462', '79 3214-7271'];
        for ($i = 0; $i < 2; $i++) {
            DB::table("telefones")->insert([
                'numero' => $numeros[$i],
                'contato_id' => 1,
                'tipo_telefone_id' => 1,
            ]);
        }
    }
}
