<?php

namespace App\Http\Controllers;

use App\Models\Negociantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NegociantesController extends Controller
{
    public function index()
    {
        $negociantes = Negociantes::where('user_id',Auth::user()->id)->get();

        return view('negociantes.index', compact('negociantes'));
    }

    public function create()
    {
        return view('negociantes.create');
    }

    public function store(Request $request)
    {

        $negociante = new Negociantes;
        $negociante->nome = mb_strtoupper($request->nome, 'UTF-8');
        $negociante->telefone = $request->telefone;
        $negociante->tipo = $request->tipo;
        $negociante->user_id = Auth::user()->id;
        $negociante->save();

        return redirect()->route('negociantes.index');
    }


    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $negociante = Negociantes::find($id);
        if (isset($negociante)) {
            return view('negociantes.edit', compact('negociante'));
        }

        return "<h1>Negociante não Encontrada!</h1>";

    }

    public function update(Request $request, $id)
    {
        $negociante = Negociantes::find($id);

        $negociante->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'telefone' => $request->telefone,
            'tipo' => $request->tipo,
        ]);

        $negociante->save();

        return redirect()->route('negociantes.index');

    }

    public function destroy($id)
    {
        $negociante = Negociantes::find($id);

        $negociante->delete();

        return redirect()->route('negociantes.index');
    }
}
