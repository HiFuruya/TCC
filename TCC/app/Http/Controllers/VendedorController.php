<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Vendedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedores::with('empresa')->get();
        // foreach($vendedores as $item){
        //     foreach($item->empresa as $teste){
        //         echo $teste->nome;
        //     }

        // }
        // dd($vendedores);
        return view('vendedor.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedor.create');
    }

    public function store(Request $request)
    {

        $regras=[
            'nome' => ['max:255'],
            'doc' => ['max:12'],
        ];

        $request->validate($regras);

        $vendedor = new Vendedores;
        $vendedor->save();
        
        $vendedor->empresa()->create([
            'nome' => $request->nome,
            'doc' => $request->doc,
            'user_id' => Auth::user()->id
        ]);

        // $empresa = new Empresa;
        // $empresa->nome = $request->nome;
        // $empresa->doc = $request->doc;
        // $empresa->user()->associate(Auth::user());
        // $empresa->save();

        // $vendedor = new Vendedores;
        // $vendedor->empresa()->associate($empresa);
        // $vendedor->save();

        return redirect()->route('vendedor.index');
    }

    public function show(Vendedores $vendedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendedores  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedores $vendedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendedorRequest  $request
     * @param  \App\Models\Vendedores  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendedores $vendedor)
    {
        //
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
