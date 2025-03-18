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
        for ($i =0; $i < 2; $i++){
            DB::table("telefones")->insert([

                'numero' => rand(81000000,99999999),
                'contato_id' => rand(1,2),
                'tipo_telefone_id' => rand(1,2),
            ]);
        }
    }
}
