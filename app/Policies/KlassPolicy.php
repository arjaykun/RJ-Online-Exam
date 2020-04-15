<?php

namespace App\Policies;

use App\Klass;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KlassPolicy
{
    use HandlesAuthorization;


    public function before($user, $ability)
    {
        if ($user->is_superadmin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any klasses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the klass.
     *
     * @param  \App\User  $user
     * @param  \App\Klass  $klass
     * @return mixed
     */
    public function view(User $user, Klass $klass)
    {
         return $klass->user->id == $user->id;
    }

    /**
     * Determine whether the user can create klasses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
         return $user->is_staff ||  $user->is_admin;
    }

    /**
     * Determine whether the user can update the klass.
     *
     * @param  \App\User  $user
     * @param  \App\Klass  $klass
     * @return mixed
     */
    public function update(User $user, Klass $klass)
    {
        return $klass->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the klass.
     *
     * @param  \App\User  $user
     * @param  \App\Klass  $klass
     * @return mixed
     */
    public function delete(User $user, Klass $klass)
    {
         return $klass->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the klass.
     *
     * @param  \App\User  $user
     * @param  \App\Klass  $klass
     * @return mixed
     */
    public function restore(User $user, Klass $klass)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the klass.
     *
     * @param  \App\User  $user
     * @param  \App\Klass  $klass
     * @return mixed
     */
    public function forceDelete(User $user, Klass $klass)
    {
        //
    }
}
