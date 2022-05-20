<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\ServiceProvider;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceProviderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny( $authUser)
    {
        return $authUser->hasPermissionTo('Read-ServiceProviders')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($authUser)
    {
        return $authUser->hasPermissionTo('Create-ServiceProvider')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($authUser, ServiceProvider $serviceProvider)
    {
        return $authUser->hasPermissionTo('Update-ServiceProvider')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($authUser, ServiceProvider $serviceProvider)
    {
        return $authUser->hasPermissionTo('Delete-ServiceProvider')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($authUser, ServiceProvider $serviceProvider)
    {

    }
}
