<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PortfolioCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioCategoryPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any portfolio categories.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the portfolio category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return mixed
     */
    public function view(User $user, PortfolioCategory $portfolioCategory)
    {
        //
    }

    /**
     * Determine whether the user can create portfolio categories.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the portfolio category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return mixed
     */
    public function update(User $user, PortfolioCategory $portfolioCategory)
    {
        //
    }

    /**
     * Determine whether the user can delete the portfolio category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return mixed
     */
    public function delete(User $user, PortfolioCategory $portfolioCategory)
    {
        //
    }

    /**
     * Determine whether the user can restore the portfolio category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return mixed
     */
    public function restore(User $user, PortfolioCategory $portfolioCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the portfolio category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return mixed
     */
    public function forceDelete(User $user, PortfolioCategory $portfolioCategory)
    {
        //
    }
}
