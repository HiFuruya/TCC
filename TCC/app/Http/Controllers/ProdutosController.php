<?php

namespace App\Http\Controllers;

use App\Models\Plantas;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos_venda = Produtos::where('user_id', Auth::user()->id)->get();
        return view('produtos.index', compact('produtos_venda'));
    }

    public function create()
    {
        $plantas = Plantas::all();
        return view('produtos.create', compact('plantas'));
    }

    public function store(Request $request)
    {
        $planta = Plantas::find($request->planta_id);

        $produto = new Produtos;
        $produto->nome = mb_strtoupper($request->nome,'UTF-8');
        $produto->user_id = Auth::user()->id;
        
        $produto->planta()->associate($planta);

        $produto->save();

        return redirect()->route('produtos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produto = Produtos::with('planta')->find($id);
        if(isset($produto)){
            return view('produtos.edit', compact('produto'));
        }

        return "<h1>Produto não Encontrado!<h1>";
    }

    public function update(Request $request, $id)
    {
        $produto = Produtos::find($id);

        $produto->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        ]);

        $produto->save();

        return redirect()->route('produtos.index');
    }

    public function destroy($id)
    {
        $produto = Produtos::find($id);

        if(isset($produto)){
            $produto->delete();
            return redirect()->route('produtos.index');
        }
        return "<h1>Produto não Encontrado!</h1>";
    }
}
