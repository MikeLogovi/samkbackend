<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PortfolioImage;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioImagePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any portfolio images.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the portfolio image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return mixed
     */
    public function view(User $user, PortfolioImage $portfolioImage)
    {
        //
    }

    /**
     * Determine whether the user can create portfolio images.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the portfolio image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return mixed
     */
    public function update(User $user, PortfolioImage $portfolioImage)
    {
        //
    }

    /**
     * Determine whether the user can delete the portfolio image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return mixed
     */
    public function delete(User $user, PortfolioImage $portfolioImage)
    {
        //
    }

    /**
     * Determine whether the user can restore the portfolio image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return mixed
     */
    public function restore(User $user, PortfolioImage $portfolioImage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the portfolio image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return mixed
     */
    public function forceDelete(User $user, PortfolioImage $portfolioImage)
    {
        //
    }
}
