<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoTelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos_telefone = ['Celular', 'Fixo'];
        foreach ($tipos_telefone as $tipo) {
            DB::table("tipos_telefones")->insert([
                'nome'=> $tipo,
            ]);
        }
    }
}
