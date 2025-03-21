<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = "telefones";

    //retorna a descrição do TipoTelefone
    public function getTipoAttribute(){
        return $this->tipoTelefone->nome;
    }
    public function tipoTelefone(){
        return $this->belongsTo(TipoTelefone::class,"tipo_telefone_id");
    }
}
