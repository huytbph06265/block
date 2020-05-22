<?php

namespace App\Policies;

use App\Cate;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cate  $cate
     * @return mixed
     */
    public function view(User $user)
    {
        return in_array('list_cate', $user->hasPermission());
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array('add_cate', $user->hasPermission());
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cate  $cate
     * @return mixed
     */
    public function update(User $user)
    {
        return in_array('edit_cate', $user->hasPermission());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cate  $cate
     * @return mixed
     */
    public function delete(User $user)
    {
        return in_array('delete_cate', $user->hasPermission());
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cate  $cate
     * @return mixed
     */
    public function restore(User $user, Cate $cate)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cate  $cate
     * @return mixed
     */
    public function forceDelete(User $user, Cate $cate)
    {
        //
    }
}
