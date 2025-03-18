<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use DB;


class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i =0; $i < 2; $i++){
            DB::table("enderecos")->insert([

                'logradouro' =>Str::random(10),
                'numero' =>rand(1,9999),
                'cidade' => Str::random(10),
                'contato_id'=>$i++
            ]);
        }
    }
}
