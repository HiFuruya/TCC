<?php

namespace App\Http\Controllers;

use App\Models\Compradores;
use App\Models\Empresa;
use App\Models\Vendedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompradorController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Compradores::class, 'comprador');
    }

    public function index()
    {
        if (Auth::user()->type == 2) {
            $compradores = Compradores::with('empresa')->get();
        }else{
            $user_id = Auth::user()->id;
            $compradores = Compradores::with('empresa')->
            whereHas('empresa',function($t)use($user_id){
                $t->where('user_id',$user_id);
            })->get();
        }

        return view('comprador.index', compact('compradores'));
    }

    public function create()
    {
        return view('comprador.create');
    }

    public function store(Request $request)
    {
        $regras=[
            'nome' => 'max:255',
            'doc' => 'max:12|unique:empresas',
            'municipio' => 'max:255',
            'endereco' => 'max:255'
        ];

        $msgs = [
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "unique" => "Já possui um [:attribute] cadastrado"
        ];

        $request->validate($regras,$msgs);

        $comprador = new Compradores;
        $comprador->inscricao_estadual = $request->inscricao_estadual;
        $comprador->municipio = mb_strtoupper($request->municipio, 'UTF-8');
        $comprador->endereco = $request->endereco;
        $comprador->save();
        
        $comprador->empresa()->create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'doc' => $request->doc,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('comprador.index');
    }


    public function show(Compradores $comprador)
    {
        
    }

    public function edit(Compradores $comprador)
    {
        if (isset($comprador)) {
            return view('comprador.edit', compact('comprador'));
        }

        return "<h1>Curso não Encontrado!</h1>";
    }

    public function update(Request $request, Compradores $comprador)
    {
        $regras=[
            'nome' => 'max:255',
            'municipio' => 'max:255',
            'endereco' => 'max:255'
        ];

        $msgs = [
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!"
        ];

        if ($request->doc != $comprador->empresa[0]->doc) {
            $regras['doc'] = 'max:12|unique:empresas';
            $msgs['unique'] = "Já possui um [:attribute] cadastrado";
        }

        $request->validate($regras,$msgs);

        $comprador->inscricao_estadual = $request->inscricao_estadual;
        $comprador->municipio = mb_strtoupper($request->municipio, 'UTF-8');
        $comprador->endereco = $request->endereco;
        $comprador->save();

        $comprador->empresa()->update([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'doc' => $request->doc,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('comprador.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compradores  $comprador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compradores $comprador)
    {
        //
    }
}
