<?php

namespace App\Policies;

use App\Facades\UserPermissions;
use App\Models\User;
use App\Models\Vendedores;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendedoresPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return UserPermissions::isAuthorized('vendedor.index');
    }

    public function view(User $user, Vendedores $vendedor)
    {
        return UserPermissions::isAuthorized('vendedor.show');
    }

    public function create(User $user)
    {
        return UserPermissions::isAuthorized('vendedor.create');
    }

    public function update(User $user, Vendedores $vendedor)
    {
        return UserPermissions::isAuthorized('vendedor.edit');
    }

    public function delete(User $user, Vendedores $vendedor)
    {
        return UserPermissions::isAuthorized('vendedor.destroy');
    }

}
