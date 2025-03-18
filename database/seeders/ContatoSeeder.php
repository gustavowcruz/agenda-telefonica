<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
        $faker = Faker::create();
            for ($i =0; $i < 2; $i++){

                DB::table("contatos")->insert([

                    'nome' => $faker->word,
                ]);
            }
        }
}
