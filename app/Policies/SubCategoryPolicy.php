<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\SubCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategoryPolicy
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
        return $authUser->hasPermissionTo('Read-SubCategories')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($authUser, SubCategory $subCategory)
    {

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($authUser)
    {
        return $authUser->hasPermissionTo('Create-SubCategories')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update( $authUser, SubCategory $subCategory)
    {
        return $authUser->hasPermissionTo('Update-SubCategories')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($authUser, SubCategory $subCategory)
    {
        return $authUser->hasPermissionTo('Delete-SubCategories')
        ? $this->allow() : $this->deny('You have no permission for this action');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, SubCategory $subCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, SubCategory $subCategory)
    {
        //
    }
}
