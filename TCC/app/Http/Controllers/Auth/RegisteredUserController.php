<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use PharIo\Manifest\Url;
use Symfony\Component\Console\Input\Input;

class RegisteredUserController extends Controller
{

    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('auth.register', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['unique:users'],
            'inscricao_estadual' => ['unique:users'],
            'endereco' => ['string'],
            'password' => ['confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'inscricao_estadual' => $request->inscricao_estadual,
            'endereco' => $request->endereco,
            'password' => Hash::make($request->password),
            'type' => $request->role
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(Request $request, User $user)
    {
        $regras=[
            'name' => ['max:255'],
            'endereco' => ['max:255'],
        ];

        if (strcmp($request->email, $user->email) != 0) {
            $regras['email'] = ['max:255', 'unique:users'];
        }

        if (strcmp($request->cpf, $user->cpf) != 0) {
            $regras['cpf'] = ['unique:users'];
        }

        if (strcmp($request->inscricao_estadual, $user->inscricao_estadual) != 0) {
            $regras['inscricao_estadual'] = ['unique:users'];
        }

        $request->validate($regras);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->inscricao_estadual = $request->inscricao_estadual;
        $user->endereco = $request->endereco;

        $user->save();

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit(User $user){

        if (isset($user)) {
            return view('edit', compact('user'));
        }
    }
}
