<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use App\Models\InsumosTransacao;
use App\Models\Notas;
use App\Models\Plantacoes;
use App\Models\Transacoes;
use Illuminate\Http\Request;

class InsumosTransacaoController extends Controller
{

    public function index()
    {
        $array = explode('?', $_SERVER['REQUEST_URI']);

        $nota = Notas::with('negociante')->where('id', $array[1])->get();

        $transacoes = Transacoes::where('nota_id', $array[1])->with('insumo')->with('plantacao')->get();

        return view('insumos_transacao.index', compact('transacoes','nota'));
    }

    public function create()
    {
        $array = explode('?', $_SERVER['REQUEST_URI']);
        $id = $array[1];

        $insumos = Insumos::orderBy('nome')->get();
        $plantacoes = Plantacoes::orderBy('nome')->get();

        return view('insumos_transacao.create', compact('insumos', 'plantacoes', 'id'));
    }

    public function store(Request $request)
    {
        $array = explode('?', $_SERVER['REQUEST_URI']);

        $nota = Notas::find($array[1]);
        $insumo = Insumos::find($request->insumo_id);
        $plantacao = Plantacoes::find($request->plantacao_id);

        $transacao = new Transacoes;

        $transacao->quantidade = $request->quantidade;
        $transacao->metodo = $request->metodo;
        $transacao->valor_unitario = $request->valor_unitario;
        if ($transacao->desconto != null) {
            $transacao->desconto = $request->desconto;
        }
        $transacao->valor_total = (($request->valor_unitario - $request->desconto) * $request->quantidade);

        $transacao->nota()->associate($nota);
        $transacao->insumo()->associate($insumo);
        $transacao->plantacao()->associate($plantacao);

        $transacao->save();

        $nota->valor_total += $transacao->valor_total;
        $nota->save();

        $plantacao->gasto += $nota->valor_total;
        $plantacao->liquido -= $plantacao->gasto;
        $plantacao->save(); 

        return redirect()->route('insumos_transacao.index', $nota->id);
    }

    public function show($id)
    {
        $transacoes = Transacoes::where('nota_id', $id)->with('insumos')->with('plantacoes')->get();

        return view('insumos_transacao.show', compact('transacoes','id'));
    }

    public function edit($id)
    {
        $insumos = Insumos::orderBy('nome')->get();
        $plantacoes = Plantacoes::orderBy('nome')->get();

        return view('insumos_transacao.create', compact('insumos', 'plantacoes', 'id'));
    }

    public function update(Request $request, $id)
    {
        $transacao = new Transacoes;

        $insumo = Insumos::find($request->insumo_id);
        $plantacao = Plantacoes::find($request->plantacao_id);
        $nota = Notas::find($request->id);

        $transacao->quantidade = $request->quantidade;
        $transacao->valor_unitario = $request->valor_unitario;
        $transacao->insumo()->associate($insumo);
        $transacao->plantacao()->associate($plantacao);
        $transacao->nota()->associate($nota);

        $transacao->save();

        return redirect()->route('insumos_transacao.index');

    }

    public function destroy(InsumosTransacao $insumosTransacao)
    {
        //
    }
}
