<?php

namespace App\Policies;


use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Student;
class StudentPolicy
{
    use HandlesAuthorization;

    
    public function before($user, $ability)
    {
        if ($user->is_superadmin) {
            return true;
        }
    }
    
    public function viewAny(User $user)
    {
        //
    }

 
    public function view(User $user)
    {
        return $user->is_admin || $user->is_staff;
    }


    public function create(User $user)
    {
        return $user->is_admin || $user->is_staff;
    }

  
    public function update(User $user)
    {
        return $user->is_admin || $user->is_staff;
    }

  
    public function delete(User $user)
    {
        return $user->is_admin || $user->is_staff;
    }

  
    public function restore(User $user)
    {
        //
    }


    public function forceDelete(User $user)
    {
        //
    }
}
