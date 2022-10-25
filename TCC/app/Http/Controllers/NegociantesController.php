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
        $regras=[
            'nome' => 'max:255',
            'telefone' => 'max:20'
        ];

        $msgs = [
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
        ];

        $request->validate($regras,$msgs);

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

        return view('negociantes.edit', compact('negociante'));
    }

    public function update(Request $request, $id)
    {
        $negociante = Negociantes::find($id);

        $regras=[
            'nome' => 'max:255',
            'telefone' => 'max:20',
        ];

        $msgs = [
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!"
        ];

        $request->validate($regras,$msgs);

        $negociante->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'telefone' => $request->telefone,
            'tipo' => $request->tipo,
            'user_id' => Auth::user()->id
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
