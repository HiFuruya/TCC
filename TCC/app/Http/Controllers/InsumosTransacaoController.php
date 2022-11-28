<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use App\Models\InsumosTransacao;
use App\Models\Negociantes;
use App\Models\Notas;
use App\Models\Plantacoes;
use App\Models\Transacoes;
use GuzzleHttp\Psr7\Request;

class InsumosTransacaoController extends Controller
{

    public function index()
    {
        $notas = Notas::with('negociante')->where('tipo',0)->get();
        
        return view('insumos_transacao.index',compact('notas'));
    }

    public function create()
    {
        $negociantes = Negociantes::where('tipo', 0)->orderBy('nome')->get();
        $tipo = 'insumos_transacao';

        return view('notas.create', compact('negociantes', 'tipo'));
    }

    public function store(StoreInsumosTransacaoRequest $request)
    {
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InsumosTransacao  $insumosTransacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(InsumosTransacao $insumosTransacao)
    {
        //
    }
}
