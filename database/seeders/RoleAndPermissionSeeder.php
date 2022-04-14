<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Super-Admin']);
        $users = ['create-users', 'edit-users', 'delete-users', 'read-users'];
        $roles = ['create-roles', 'edit-roles', 'delete-roles', 'read-roles'];
        $permission = ['create-permissions', 'delete-permissions', 'read-permissions'];
        $categories = ['create-categories', 'edit-categories', 'delete-categories', 'read-categories'];
        $blogs = ['create-blogs', 'edit-blogs', 'delete-blogs', 'read-blogs'];
        $pages = ['create-pages', 'edit-pages', 'delete-pages', 'read-pages'];
        $bloggalery = ['edit-galery', 'delete-galery', 'multi-delete-galery', 'read-galery'];
        $permissions=  array_merge($users,$roles,$permission,$categories,$blogs,$pages,$bloggalery);
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ($permissions as $permission) {
            $perm = Permission::create(['name' => $permission]);
            Role::find(1)->givePermissionTo($perm);
        }
        User::find(1)->syncRoles('Super-Admin');
    }
}
