<?php

namespace App\Http\Controllers;

use App\Models\Negociantes;
use App\Models\Notas;
use App\Models\Plantacoes;
use App\Models\Produtos;
use App\Models\ProdutosTransacao;
use App\Models\Transacoes;

class ProdutosTransacaoController extends Controller
{

    public function index()
    {
        $notas = Notas::with('negociante')->where('tipo',1)->get();
        
        return view('produtos_transacao.index',compact('notas'));
    }

    public function create()
    {
        $negociantes = Negociantes::where('tipo', 1)->orderBy('nome')->get();
        $tipo = 'produtos_transacao';

        return view('notas.create', compact('negociantes','tipo'));
    }


    public function store(StoreProdutosTransacaoRequest $request)
    {
        //
    }

    public function show($id)
    {
        $transacoes = Transacoes::where('nota_id', $id)->with('produtos')->with('plantacoes')->get();

        return view('produtos_transacao.show', compact('transacoes', 'id'));
    }

    public function edit($id)
    {
        $produtos = Produtos::orderBy('nome')->get();
        $plantacoes = Plantacoes::orderBy('nome')->get();

        return view('produtos_transacao.create', compact('produtos', 'plantacoes', 'id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutosTransacaoRequest  $request
     * @param  \App\Models\ProdutosTransacao  $produtosTransacao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdutosTransacaoRequest $request, ProdutosTransacao $produtosTransacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutosTransacao  $produtosTransacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutosTransacao $produtosTransacao)
    {
        //
    }
}
