<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Create-Admin', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Read-Admins', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Update-Admin', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Delete-Admin', 'guard_name'=>'admin']);

        Permission::create(['name' => 'Create-Category', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Read-Categories', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Update-Category', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Delete-Category', 'guard_name'=>'admin']);

        Permission::create(['name' => 'Create-SubCategory', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Read-SubCategories', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Update-SubCategory', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Delete-SubCategory', 'guard_name'=>'admin']);
        
        Permission::create(['name' => 'Read-Permissions', 'guard_name'=>'admin']);

        Permission::create(['name' => 'Create-City', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Read-Cities', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Update-City', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Delete-City', 'guard_name'=>'admin']);


        Permission::create(['name' => 'Create-Role', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Read-Roles', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Update-Role', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Delete-Role', 'guard_name'=>'admin']);

        Permission::create(['name' => 'Create-ServiceProvider', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Read-ServiceProviders', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Update-ServiceProvider', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Delete-ServiceProvider', 'guard_name'=>'admin']);

        Permission::create(['name' => 'Read-Users', 'guard_name'=>'admin']);
        Permission::create(['name' => 'Delete-User', 'guard_name'=>'admin']);


        Permission::create(['name' => 'Read-ServiceProviders', 'guard_name'=>'user']);

    }
}
