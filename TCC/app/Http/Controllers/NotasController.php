<?php

namespace App\Http\Controllers;

use App\Models\Negociantes;
use App\Models\Notas;
use App\Models\Plantacoes;
use App\Models\Transacoes;
use Carbon\Carbon;
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
        $nota = Notas::find($id);

        if(isset($nota)){

            $negociantes = Negociantes::where('tipo', $nota->tipo)->get();

            return view('notas.edit', compact('nota', 'negociantes'));
        }

        return "<h1>Nota não Encontrada!</h1>";

    }

    public function update(Request $request, $id){

        $nota = Notas::find($id);

        if (isset($nota)) {
            $nota->fill([
                'emissao' => $request->emissao,
            ]);

            $negociante = Negociantes::find($request->negociante_id);

            $nota->negociante()->associate($negociante);

            $nota->save();

            return redirect()->route('notas.index',$nota->tipo);

        }

        return "<h1>Nota não Encontrada!</h1>";

    }

    public function destroy($id)
    {
        $nota = Notas::find($id);

        if(isset($nota)){

            $transacoes = Transacoes::where('nota_id', $id)->get();

            if ($nota->tipo == 1) {
                for ($i=0; $i < count($transacoes); $i++) { 

                    $plantacao = Plantacoes::find($transacoes[$i]->plantacao_id);
                    if ($plantacao != null) {

                        $plantacao->lucro -= $transacoes[$i]->valor_total;
                        $plantacao->liquido = ($plantacao->lucro - $plantacao->gasto);
                        $plantacao->save();
                    }
                    
                    $transacoes[$i]->delete();
                }
            }else{
                for ($i=0; $i < count($transacoes); $i++) { 

                    $plantacao = Plantacoes::find($transacoes[$i]->plantacao_id);
                    if ($plantacao != null) {
                        $plantacao->gasto -= $transacoes[$i]->valor_total;
                        $plantacao->liquido = ($plantacao->lucro - $plantacao->gasto);
                        $plantacao->save();
                    }

                    $transacoes[$i]->delete();
                }
            }


            $nota->delete();

            return redirect()->route('notas.index', $nota->tipo);
        }

        return "<h1>Nota não Encontrada!</h1>";

    }
}
