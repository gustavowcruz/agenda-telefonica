<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = "telefones";
    public function tipoTelefone(){
        return $this->belongsTo(TipoTelefone::class,"tipo_telefone_id");
    }
}
