<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logradouro = ['Rua','Apartamento'];
        $numero = [278, 10];
        $cidade = ['Itabaiana','Aracaju'];
        for ($i = 0; $i < 2; $i++) {

            DB::table("enderecos")->insert([
                'logradouro' => $logradouro[$i],
                'numero' =>$numero[$i],
                'cidade' => $cidade[$i],
                'contato_id'=>$i+1,
            ]);
        }
    }
}
