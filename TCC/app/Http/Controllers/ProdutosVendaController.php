<?php

namespace App\Http\Controllers;

use App\Models\ProdutosVenda;
use App\Http\Requests\StoreProdutosVendaRequest;
use App\Http\Requests\UpdateProdutosVendaRequest;

class ProdutosVendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdutosVendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdutosVendaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdutosVenda  $produtosVenda
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutosVenda $produtosVenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutosVenda  $produtosVenda
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutosVenda $produtosVenda)
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
    public function update(UpdateProdutosVendaRequest $request, ProdutosVenda $produtosVenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutosVenda  $produtosVenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutosVenda $produtosVenda)
    {
        //
    }
}
