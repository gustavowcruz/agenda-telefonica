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
        $tipos_telefone = ['Celular', 'Fixo'];
        foreach ($tipos_telefone as $tipo) {
            DB::table("tipos_telefones")->insert([
                'tipo'=> $tipo,
            ]);
        }
    }
}
