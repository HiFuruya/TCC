<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use App\Models\Plantas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsumosController extends Controller
{
    public function index()
    {
        $insumos = Insumos::where('user_id', Auth::user()->id)->get();
        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        return view('insumos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdutosVendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdutosVenda  $produtosVenda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutosVenda  $produtosVenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutosVendaRequest  $request
     * @param  \App\Models\ProdutosVenda  $produtosVenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutosVenda  $produtosVenda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
