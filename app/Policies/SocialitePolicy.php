<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Socialite;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialitePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any socialites.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the socialite.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Socialite  $socialite
     * @return mixed
     */
    public function view(User $user, Socialite $socialite)
    {
        //
    }

    /**
     * Determine whether the user can create socialites.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the socialite.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Socialite  $socialite
     * @return mixed
     */
    public function update(User $user, Socialite $socialite)
    {
        //
    }

    /**
     * Determine whether the user can delete the socialite.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Socialite  $socialite
     * @return mixed
     */
    public function delete(User $user, Socialite $socialite)
    {
        //
    }

    /**
     * Determine whether the user can restore the socialite.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Socialite  $socialite
     * @return mixed
     */
    public function restore(User $user, Socialite $socialite)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the socialite.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Socialite  $socialite
     * @return mixed
     */
    public function forceDelete(User $user, Socialite $socialite)
    {
        //
    }
}
