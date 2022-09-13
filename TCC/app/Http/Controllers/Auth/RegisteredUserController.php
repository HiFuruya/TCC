<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'unique:users'],
            'inscricao_estadual' => ['required', 'unique:users'],
            'endereco' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'inscricao_estadual' => $request->inscricao_estadual,
            'endereco' => $request->endereco,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(Request $request, User $user)
    {
        $regras=[
            'name' => ['required', 'string', 'max:255'],
            'endereco' => ['required', 'string'],
        ];

        if (strcmp($request->email, $user->email) != 0) {
            $regras['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
        }

        if (strcmp($request->cpf, $user->cpf) != 0) {
            $regras['cpf'] = ['required', 'unique:users'];
        }

        if (strcmp($request->inscricao_estadual, $user->inscricao_estadual) != 0) {
            $regras['inscricao_estadual'] = ['required', 'unique:users'];
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
