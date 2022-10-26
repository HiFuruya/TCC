<?php

namespace App\Http\Controllers;

use App\Models\Plantas;
use App\Models\ProdutosVenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutosVendaController extends Controller
{
    public function index()
    {
        $produtos_venda = ProdutosVenda::where('user_id', Auth::user()->id)->get();
        return view('produtos_vendas.index', compact('produtos_venda'));
    }

    public function create()
    {
        $plantas = Plantas::all();
        return view('produtos_vendas.create', compact('plantas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdutosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutosRequest  $request
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
