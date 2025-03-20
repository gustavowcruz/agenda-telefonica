<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = "contatos";

    public function getPrimeiroTelefoneAttribute(){
        return $this->telefones->first()->numero;
    }
    public function getContatosRecentesAttribute(){
        return $this->orderBy('id','desc')->take(10)->get();
    }
    public function categorias(){
        return $this->belongsToMany(Categoria::class, 'categorias_has_contatos', 'contato_id', 'categoria_id');
    }
    public function enderecos() {
        return $this->hasMany(Endereco::class, 'contato_id');
    }
    public function telefones() {
        return $this->hasMany(Telefone::class,'contato_id');
    }
}
