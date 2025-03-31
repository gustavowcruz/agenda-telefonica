<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;



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
