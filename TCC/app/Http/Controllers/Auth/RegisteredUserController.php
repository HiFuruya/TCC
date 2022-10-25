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
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(Request $request, User $user)
    {
        $regras=[
            'name' => ['max:255'],
        ];

        if (strcmp($request->email, $user->email) != 0) {
            $regras['email'] = ['max:255', 'unique:users'];
        }

        $request->validate($regras);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit(User $user){

        if (isset($user)) {
            return view('edit', compact('user'));
        }
    }
}
