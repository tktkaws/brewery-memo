<?php

namespace App\Policies;

use App\Brewery;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BreweryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any breweries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the brewery.
     *
     * @param  \App\User  $user
     * @param  \App\Brewery  $brewery
     * @return mixed
     */
    public function view(?User $user, Brewery $brewery)
    {
        return true;
    }

    /**
     * Determine whether the user can create breweries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the brewery.
     *
     * @param  \App\User  $user
     * @param  \App\Brewery  $brewery
     * @return mixed
     */
    public function update(User $user, Brewery $brewery)
    {
        return $user->id === $brewery->user_id;
    }

    /**
     * Determine whether the user can delete the brewery.
     *
     * @param  \App\User  $user
     * @param  \App\Brewery  $brewery
     * @return mixed
     */
    public function delete(User $user, Brewery $brewery)
    {
        return $user->id === $brewery->user_id;
    }

    /**
     * Determine whether the user can restore the brewery.
     *
     * @param  \App\User  $user
     * @param  \App\Brewery  $brewery
     * @return mixed
     */
    public function restore(User $user, Brewery $brewery)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the brewery.
     *
     * @param  \App\User  $user
     * @param  \App\Brewery  $brewery
     * @return mixed
     */
    public function forceDelete(User $user, Brewery $brewery)
    {
        //
    }
}