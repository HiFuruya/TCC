<?php

namespace App\Policies;

use App\Facades\UserPermissions;
use App\Models\Compradores;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompradoresPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    { 
        return UserPermissions::isAuthorized('comprador.index');
    }

    public function view(User $user, Compradores $comprador)
    {
        return UserPermissions::isAuthorized('comprador.show');
        
    }

    public function create(User $user)
    {
        return UserPermissions::isAuthorized('comprador.create');
    }

    public function update(User $user, Compradores $comprador)
    {
        return UserPermissions::isAuthorized('comprador.edit');
    }

    public function delete(User $user, Compradores $comprador)
    {
        return UserPermissions::isAuthorized('comprador.destroy');
    }

}
