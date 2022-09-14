<?php

namespace App\Http\Controllers;

use App\Models\LinkPlantacoes;
use App\Models\Plantacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantacoesController extends Controller
{
    public function index()
    {
        return view('plantacoes.index');
    }

    public function create()
    {
        $plantacoes = Plantacoes::orderBy('nome')->get();
        return view('plantacoes.create', compact('plantacoes'));
    }

    public function store(Request $request)
    {
        $regras = [
            'id' => 'required',
        ];

        $request->validate($regras);

        $plantacoes = Plantacoes::find($request->id);

        $linkPlantacoes = new LinkPlantacoes;

        $linkPlantacoes->plantacoes()->associate($plantacoes);

        $linkPlantacoes->user()->associate(Auth::user());

        $linkPlantacoes->save();

        return view('plantacoes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LinkPlantacoes  $linkPlantacoes
     * @return \Illuminate\Http\Response
     */
    public function show(Plantacoes $linkPlantacoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LinkPlantacoes  $linkPlantacoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantacoes $linkPlantacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLinkPlantacoesRequest  $request
     * @param  \App\Models\LinkPlantacoes  $linkPlantacoes
     * @return \Illuminate\Http\Response
     */
    public function update(Plantacoes $request, Plantacoes $linkPlantacoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LinkPlantacoes  $linkPlantacoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantacoes $linkPlantacoes)
    {
        //
    }
}
