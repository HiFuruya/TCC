<?php

namespace App\Http\Controllers;

use App\Models\Plantacoes;
use App\Models\Plantas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantacoesController extends Controller
{

    public function index()
    {
        $plantacoes = Plantacoes::where('user_id', Auth::user()->id)->get();
        return view('plantacoes.index', compact('plantacoes'));
    }

    public function create()
    {
        $plantas = Plantas::orderBy('nome')->get();
        return view('plantacoes.create', compact('plantas'));
    }

    public function store(Request $request)
    {
        $planta = Plantas::find($request->planta_id);

        $plantacao = new Plantacoes;

        $plantacao->nome = mb_strtoupper($request->nome, 'UTF-8');
        $plantacao->plantio = $request->plantio;
        $plantacao->lua = $request->lua;
        $plantacao->mudas = $request->mudas;

        $plantacao->planta()->associate($planta);

        $plantacao->user()->associate(Auth::user());

        $plantacao->save();

        return redirect()->route('plantacoes.index');
    }

    public function edit($id){
        
        $plantacao = Plantacoes::find($id);
        if (isset($plantacao)) {
            $plantas = Plantas::orderBy('nome')->get();
            return view('plantacoes.edit', compact('plantacao','plantas'));
        }

        return "<h1>Plantação não Encontrada!</h1>";
    }

    public function update(Request $request, $id){

        $plantacao = Plantacoes::find($id);

        $planta = Plantas::find($request->planta_id);

        $plantacao->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'plantio' => $request->plantio,
            'lua' => $request->lua,
            'mudas' => $request->mudas
        ]);

        $plantacao->planta()->associate($planta);

        $plantacao->save();

        return redirect()->route('plantacoes.index');
    }

    public function show(Plantacoes $linkPlantacoes)
    {
        //
    }

    public function destroy($id)
    {
        $plantacao = Plantacoes::find($id);

        $plantacao->delete();

        return redirect()->route('plantacoes.index');
    }

}
