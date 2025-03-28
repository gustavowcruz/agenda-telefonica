<?php

namespace App\Http\Controllers;

use App\Models\{Contato, Categoria, Endereco, Telefone, TipoTelefone};
use Illuminate\Http\Request;


class ContatoController extends Controller
{

    protected $contatos, $categorias, $tipos_telefones;
    public function __construct(Contato $contatos, Categoria $categorias, TipoTelefone $tipos_telefones)
    {
        $this->telefones = new Telefone();
        $this->enderecos = new Endereco();
        $this->contatos = $contatos;
        $this->categorias = $categorias->all()->pluck('classificacao', 'id'); // quando você pega as coisas que NÃO é pra chamar e só referenciar você faz isso ai [all()->pluck('algm coisa', 'id')]
        $this->tipos_telefones = $tipos_telefones->all()->pluck('nome','id'); // ele inverte (MAS PODE PASSAR 1 SÓ);)
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
        $contato = $this->contatos->create([
            'nome'=> $request->nome,
        ]);

        $this->enderecos->create([
            'cidade' => $request->cidade,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero_endereco,
            'contato_id' => $contato->id,

        ]);
       $this->telefones->create([
            'numero'=> $request->telefone1,
            'contato_id' => $contato->id,
            'tipo_telefone_id' => $request->tipo_telefone1,
        ]);
        if (isset($request->telefone2)) {
            $this->telefones->create([
                'numero'=> $request->telefone2,
                'contato_id' => $contato->id,
                'tipo_telefone_id' => $request->tipo_telefone2,
            ]);
        };

        $contato->categorias()->attach(
            $request->categoria_id
        );

        return redirect()->route('contatos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorias = $this->categorias;
        $tipos_telefones = $this->tipos_telefones;
        $form = 'disabled';
        $contato = $this->contatos->find($id);
        return view('contatos.form', compact('contato','categorias','tipos_telefones', 'form'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorias = $this->categorias;
        $tipos_telefones = $this->tipos_telefones;
        $contato = $this->contatos->findOrFail($id);
        return view('contatos.form', compact('contato','categorias','tipos_telefones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)//
    {
        $contato = tap($this->contatos->findOrFail($id))->update([ //tap(): retorna oq ta dentro do tap e executa o q vem dps, permite encadear metodos
            'nome'=> $request->nome,
        ]);

        tap($this->enderecos->findOrFail($contato->enderecos->first()->id))->update([
            'cidade' => $request->cidade,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero_endereco,
            'contato_id' => $contato->id,
        ]);
        tap($this->telefones->findOrFail($contato->telefones->first()->id))->update([
            'numero'=> $request->telefone1,
            'contato_id' => $contato->id,
            'tipo_telefone_id' => $request->tipo_telefone1,
        ]);

        if (isset($request->telefone2)) {
            if($contato->telefones->get(1) != null) {
                tap($this->telefones->findOrFail($contato->telefones->get(1)->id))->update([
                    'numero'=> $request->telefone2,
                    'contato_id' => $contato->id,
                    'tipo_telefone_id' => $request->tipo_telefone2,
                ]);
            } else {
                $this->telefones->create([
                    'numero'=> $request->telefone2,
                    'contato_id' => $contato->id,
                    'tipo_telefone_id' => $request->tipo_telefone2,
                ]);
            }
        } else if($contato->telefones->get(1) != null) {
            $contato->telefones->get(1)->delete();
        }

        $contato->categorias()->sync($request->categoria_id); //diferente do atach, que adciona sem remover, ele substitui todas as categorias existentes
            return redirect()->route('contatos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contato = $this->contatos->find($id);
        $contato->telefones()->delete();
        $contato->enderecos()->delete();
        $contato->categorias()->detach();
        $contato->delete();
        return redirect()->route('contatos.index');
    }
}
