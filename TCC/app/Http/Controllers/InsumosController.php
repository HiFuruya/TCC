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

    public function store(Request $request)
    {
        $insumo = new Insumos;
        $insumo->nome = mb_strtoupper($request->nome, 'UTF-8');
        $insumo->descricao = mb_strtoupper($request->descricao,'UTF-8');
        $insumo->user_id = Auth::user()->id;
        $insumo->save();

        return redirect()->route('insumos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $insumo = Insumos::find($id);
        if (isset($insumo)) {
            return view('insumos.edit', compact('insumo'));
        }

        return "<h1>Insumo não Encontrada!</h1>";

    }

    public function update(Request $request, $id)
    {
        $insumo = Insumos::find($id);

        $insumo->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'descricao' => mb_strtoupper($request->descricao, 'UTF-8')
        ]);

        $insumo->save();

        return redirect()->route('insumos.index');
    }

    public function destroy($id)
    {
        $insumo = Insumos::find($id);

        if(isset($insumo)){
            $insumo->delete();

            return redirect()->route('insumos.index');
        }
        return "<h1>Insumo não Encontrada!</h1>";
    }
}
