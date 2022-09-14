<?php

namespace App\Policies;

use App\Facades\UserPermissions;
use App\Models\Plantacoes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlantacoesPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return UserPermissions::isAuthorized('plantacoes.index');
    }

    public function view(User $user, Plantacoes $plantacoes)
    {
        return UserPermissions::isAuthorized('plantacoes.show');
    }

    public function create(User $user)
    {
        return UserPermissions::isAuthorized('plantacoes.create');
    }

    public function update(User $user, Plantacoes $plantacoes)
    {
        return UserPermissions::isAuthorized('plantacoes.edit');
    }

    public function delete(User $user, Plantacoes $plantacoes)
    {
        return UserPermissions::isAuthorized('plantacoes.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Plantacoes  $plantacoes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Plantacoes $plantacoes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Plantacoes  $plantacoes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Plantacoes $plantacoes)
    {
        //
    }
}
