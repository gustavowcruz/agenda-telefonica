<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contato;
use App\Models\TipoTelefone;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    protected $contatos, $categorias, $tipos_telefones;
    public function __construct(Contato $contatos, Categoria $categorias, TipoTelefone $tipos_telefones)
    {
        $this->contatos = $contatos;
        $this->categorias = $categorias->all()->pluck('classificacao', 'id');
        $this->tipos_telefones = $tipos_telefones->all()->pluck('nome','id'); //ele inverte ;)
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = $this->contatos->all();
        return view('contatos.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = $this->categorias;
        $tipos_telefones = $this->tipos_telefones;
        return view('contatos.form', compact('categorias','tipos_telefones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorias = $this->categorias;
        $tipos_telefones = $this->tipos_telefones;
        $contato = $this->contatos->find($id);
        return view('contatos.form', compact('contato','categorias','tipos_telefones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorias = $this->categorias;
        $tipos_telefones = $this->tipos_telefones;
        $contato = $this->contatos->find($id);
        return view('contatos.form', compact('contato','categorias','tipos_telefones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contato $contato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contato $contato)
    {
        //
    }
}
