<?php

namespace App\Http\Controllers;

use App\Models\Negociantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NegociantesController extends Controller
{
    public function index()
    {
        $negociantes = Negociantes::where('user_id',Auth::user()->id)->orderBy('nome')->get();

        return view('negociantes.index', compact('negociantes'));
    }

    public function create()
    {
        return view('negociantes.create');
    }

    public function store(Request $request)
    {
        $regras = [
            'telefone' => 'required|max:18|min:8'
        ];

        $msgs = [
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!"
        ];

        $request->validate($regras, $msgs);

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

        return "<h1>Negociante não Encontrado!</h1>";

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

        if(isset($negociante)){
            $negociante->delete();
            return redirect()->route('negociantes.index');
        }

        return "<h1>Negociante não Encontrado!</h1>";

    }
}
