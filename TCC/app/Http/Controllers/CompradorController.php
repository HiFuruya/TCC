<?php

namespace App\Http\Controllers;

use App\Models\Compradores;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompradorController extends Controller
{
    public function index()
    {
        $compradores = Empresa::with('compradores')->where('user_id', Auth::user()->id)->get();
        dd($compradores);
        return view('comprador.index', compact('compradores'));
    }

    public function create()
    {
        return view('comprador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompradorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compradores  $comprador
     * @return \Illuminate\Http\Response
     */
    public function show(Compradores $comprador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compradores  $comprador
     * @return \Illuminate\Http\Response
     */
    public function edit(Compradores $comprador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompradorRequest  $request
     * @param  \App\Models\Compradores  $comprador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compradores $comprador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compradores  $comprador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compradores $comprador)
    {
        //
    }
}
