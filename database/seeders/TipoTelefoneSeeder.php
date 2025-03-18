<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class TipoTelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i =0; $i < 2; $i++){
            DB::table("tipos_telefones")->insert([

                'tipo'=>Str::random(10)
            ]);
        }
    }
}
