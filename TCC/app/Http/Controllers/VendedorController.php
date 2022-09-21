<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Vendedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Vendedores::class, 'vendedor');
    }

    public function index()
    {
        if (Auth::user()->type == 2) {
            $vendedores = Vendedores::with('empresa')->get();
        }else{
            $user_id = Auth::user()->id;
            $vendedores = Vendedores::with('empresa')->
                    whereHas('empresa',function($t)use($user_id){
                $t->where('user_id',$user_id);
            })->get();
        }

        return view('vendedor.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedor.create');
    }

    public function store(Request $request)
    {

        $regras=[
            'nome' => 'max:255',
            'doc' => 'max:12|unique:empresas',
        ];

        $msgs = [
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "unique" => "Já possui um [:attribute] cadastrado"
        ];

        $request->validate($regras, $msgs);

        $vendedor = new Vendedores;
        $vendedor->save();
        
        $vendedor->empresa()->create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'doc' => $request->doc,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('vendedor.index');
    }

    public function show(Vendedores $vendedor)
    {
        dd($vendedor);
    }

    public function edit (Vendedores $vendedor)
    {
        if (isset($vendedor)) {
            return view('vendedor.edit', compact('vendedor'));
        }  

        return "<h1>Curso não Encontrado!</h1>";
    }

    public function update(Request $request, Vendedores $vendedor)
    {
        $regras=[
            'nome' => 'max:255'
        ];

        $msgs = [
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!"
        ];

        if ($request->doc != $vendedor->empresa[0]->doc) {
            $regras['doc'] = 'max:12|unique:empresas';
            $msgs['unique'] = "Já possui um [:attribute] cadastrado";
        }

        $request->validate($regras, $msgs);

        $vendedor->empresa[0]->nome = mb_strtoupper($request->nome);
        $vendedor->empresa[0]->doc = $request->doc;

        $vendedor->empresa[0]->save();

        return redirect()->route('vendedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendedores  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedores $vendedor)
    {
        //
    }
}
