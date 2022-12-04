<?php

namespace App\Http\Controllers;

use App\Models\Negociantes;
use App\Models\Notas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotasController extends Controller
{
    public function index()
    {
        $array = explode('?', $_SERVER['REQUEST_URI']);

        if ($array[1] == 0) {
            
            $notas = Notas::with('negociante')->where('tipo',0)->where('user_id', Auth::user()->id)->get();
            $tipo = 'insumos_transacao';
            $titulo = 'COMPRAS';
            
        }else{

            $notas = Notas::with('negociante')->where('tipo',1)->where('user_id', Auth::user()->id)->get();
            $tipo = 'produtos_transacao';
            $titulo = 'VENDAS';
        }

        $id = $array[1];

        return view('notas.index',compact('notas', 'tipo', 'titulo', 'id'));
    }

    public function create()
    {
        $array = explode('?', $_SERVER['REQUEST_URI']);
        $id = $array[1];

        if ($id == 1) {
            $negociantes = Negociantes::where('tipo', 1)->get();
        }else{
            $negociantes = Negociantes::where('tipo', 0)->get();
        }

        return view('notas.create', compact('negociantes', 'id'));
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
            if ($nota->tipo == 0) {
                return redirect()->route('insumos_transacao.index', $nota->id);
            }else{
                return redirect()->route('produtos_transacao.index', $nota->id);
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
