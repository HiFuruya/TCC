<?php

namespace App\Http\Controllers;

use App\Models\LinkPlantacoes;
use App\Models\Plantacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantacoesController extends Controller
{

    public function __construct() {
        $this->authorizeResource(Plantacoes::class, 'plantaco');
    }

    public function index()
    {
        if (Auth::user()->type == 2) {
            $plantacoes = LinkPlantacoes::with(['plantacoes', 'user'])->orderBy('user_id')->get();
        }else{
            $plantacoes = LinkPlantacoes::with(['plantacoes'])->where('user_id', Auth::user()->id)->get();
        }
        return view('plantacoes.index', compact('plantacoes'));
    }

    public function create()
    {
        $plantacoes = Plantacoes::orderBy('nome')->get();
        return view('plantacoes.create', compact('plantacoes'));
    }

    public function store(Request $request)
    {

        $plantacoes = Plantacoes::find($request->id);

        $linkPlantacoes = new LinkPlantacoes;

        $linkPlantacoes->plantacoes()->associate($plantacoes);

        $linkPlantacoes->user()->associate(Auth::user());

        $linkPlantacoes->save();

        return redirect()->route('plantacoes.index');
    }


    public function show(Plantacoes $linkPlantacoes)
    {
        //
    }

    public function deletar(Request $request)
    {
        $explode = explode('/', $request->url());
        $user_id = $explode[4];
        $plantacao_id = $explode[5];

        $linkPlantacoes = new LinkPlantacoes;

        $linkPlantacoes->where('plantacoes_id', $plantacao_id)->where('user_id', $user_id)->delete();

        return redirect()->route('plantacoes.index');
    }

}
