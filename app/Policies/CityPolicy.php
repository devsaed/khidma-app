<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\City;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($authUser)
    {
        return $this->allow();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view( $authUser, City $city)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create( $authUser)
    {
        return $authUser->hasPermissionTo('Create-City')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($authUser, City $city)
    {
        return $authUser->hasPermissionTo('Update-City')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete( $authUser, City $city)
    {
        return $authUser->hasPermissionTo('Delete-City')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, City $city)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, City $city)
    {
        //
    }
}
