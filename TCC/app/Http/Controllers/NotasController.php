<?php

namespace App\Http\Controllers;

use App\Models\InsumosTransacao;
use App\Models\Negociantes;
use App\Models\Notas;
use App\Models\ProdutosTransacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotasController extends Controller
{
    public function index()
    {
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $negociante = Negociantes::find($request->negociante_id);
        if (isset($negociante)) {
            $nota = new Notas;
            $nota->emissao = $request->emissao;
            $nota->negociante()->associate($negociante);
            $nota->tipo = $negociante->tipo;
            $nota->user_id = Auth::user()->id;

            $nota->save();

            return redirect()->route('notas.show',$nota->id);
        }

        return "<h1>Negociante não Encontrado!</h1>";

    }

    public function show($id)
    {
        $nota = Notas::find($id);

        if(isset($nota)){
            if ($nota->tipo = 0) {
                return redirect()->route('insumos_transacao.show', $nota->id);
            }else{
                return redirect()->route('produtos_transacao.show', $nota->id);
            }
        }

        return "<h1>Nota não Encontrada!</h1>";

    }

    public function edit($id)
    {
        
    }

    public function destroy($id)
    {
        //
    }
}
