<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
            $nomes = ['Ana','Roberto'];
            foreach ($nomes as $nome) {
                DB::table("contatos")->insert([
                "nome"=> $nome,
            ]);

        }
    }
}
