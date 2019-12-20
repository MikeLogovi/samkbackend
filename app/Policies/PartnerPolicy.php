<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Partner;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnerPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any partners.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the partner.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return mixed
     */
    public function view(User $user, Partner $partner)
    {
        //
    }

    /**
     * Determine whether the user can create partners.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->role==config('samk.roles')[2]&& Auth()->is_now_partner==true)|| $user->role=='admin';

    }

    /**
     * Determine whether the user can update the partner.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return mixed
     */
    public function update(User $user, Partner $partner)
    {
        return (($user->role==config('samk.roles')[2]&& Auth()->is_now_partner==true) && Auth::id == $partner->user->id) || $user->role=='admin';
    }

    /**
     * Determine whether the user can delete the partner.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return mixed
     */
    public function delete(User $user, Partner $partner)
    {
        return (($user->role==config('samk.roles')[2]&& Auth()->is_now_partner==true) && Auth::id == $partner->user->id) || $user->role=='admin';
    }

    /**
     * Determine whether the user can restore the partner.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return mixed
     */
    public function restore(User $user, Partner $partner)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the partner.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Partner  $partner
     * @return mixed
     */
    public function forceDelete(User $user, Partner $partner)
    {
        //
    }
}
