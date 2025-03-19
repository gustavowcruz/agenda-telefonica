<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contato extends Model
{
    protected $table = "contatos";

    public function categorias(){
        return $this->belongsToMany(Categoria::class, 'categorias_has_contatos', 'categoria_id', 'contato_id');
    }
    public function enderecos() {
        return $this->hasMany(Endereco::class, 'contato_id');
    }
    public function telefones() {
        return $this->hasMany(Telefone::class,'contato_id');
    }
}
