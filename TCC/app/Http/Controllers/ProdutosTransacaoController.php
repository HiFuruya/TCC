<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use App\Models\Plantacoes;
use App\Models\Produtos;
use App\Models\ProdutosTransacao;
use App\Models\Transacoes;
use Illuminate\Http\Request;


class ProdutosTransacaoController extends Controller
{

    public function index()
    {
        $array = explode('?', $_SERVER['REQUEST_URI']);

        $nota = Notas::with('negociante')->where('id', $array[1])->get();

        $transacoes = Transacoes::where('nota_id', $array[1])->with('produto')->with('plantacao')->get();

        return view('produtos_transacao.index', compact('transacoes', 'nota'));
    }

    public function create()
    {
        $array = explode('?', $_SERVER['REQUEST_URI']);
        $id = $array[1];

        $produtos = Produtos::orderBy('nome')->get();
        $plantacoes = Plantacoes::orderBy('nome')->get();

        return view('produtos_transacao.create', compact('produtos', 'plantacoes', 'id'));
    }


    public function store(Request $request)
    {
        $array = explode('?', $_SERVER['REQUEST_URI']);

        $nota = Notas::find($array[1]);
        $produto = Produtos::find($request->produto_id);
        $plantacao = Plantacoes::find($request->plantacao_id);

        $transacao = new Transacoes;

        $transacao->quantidade = $request->quantidade;
        $transacao->metodo = $request->metodo;
        $transacao->valor_unitario = $request->valor_unitario;
        if ($request->desconto != null) {
            $transacao->desconto = $request->desconto;
        }
        $transacao->valor_total = (($request->valor_unitario - $request->desconto) * $request->quantidade);
        
        $transacao->nota()->associate($nota);
        $transacao->produto()->associate($produto);
        $transacao->plantacao()->associate($plantacao);

        $transacao->save();

        $nota->valor_total += $transacao->valor_total;
        $nota->save();

        $plantacao->lucro += $transacao->valor_total;
        $plantacao->liquido += $transacao->valor_total;
        $plantacao->save(); 

        return redirect()->route('produtos_transacao.index', $nota->id);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
