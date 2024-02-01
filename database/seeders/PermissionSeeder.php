<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Enum\Roles;
use App\Enum\Permissions;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::create(['name' => Roles::ADMIN, 'guard_name' => 'api']);
        $user = Role::create(['name' => Roles::USER, 'guard_name' => 'api']);

        Permission::create(['name' => Permissions::VIEW_MY_PROFILE, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::UPDATE_MY_ACCOUNT, 'guard_name' => 'api']);

        Permission::create(['name' => Permissions::VIEW_ANY_POST, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::LIKE_ANY_POST, 'guard_name' => 'api']);

        Permission::create(['name' => Permissions::CREATE_NEW_POST, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::READ_MY_POST, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::UPDATE_MY_POST, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::DELETE_MY_POST, 'guard_name' => 'api']);

        Permission::create(['name' => Permissions::READ_ANY_POST, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::UPDATE_ANY_POST, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::DELETE_ANY_POST, 'guard_name' => 'api']);

        Permission::create(['name' => Permissions::CREATE_ANY_ACCOUNT, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::READ_ANY_ACCOUNT, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::UPDATE_ANY_ACCOUNT, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::DELETE_ANY_ACCOUNT, 'guard_name' => 'api']);

        Permission::create(['name' => Permissions::CREATE_ANY_COMMENT, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::READ_ANY_COMMENT, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::UPDATE_ANY_COMMENT, 'guard_name' => 'api']);
        Permission::create(['name' => Permissions::DELETE_ANY_COMMENT, 'guard_name' => 'api']);

        $admin->givePermissionTo(Permissions::VIEW_MY_PROFILE);
        $admin->givePermissionTo(Permissions::UPDATE_MY_ACCOUNT);

        $admin->givePermissionTo(Permissions::VIEW_ANY_POST);
        $admin->givePermissionTo(Permissions::LIKE_ANY_POST);

        $admin->givePermissionTo(Permissions::CREATE_NEW_POST);
        $admin->givePermissionTo(Permissions::READ_MY_POST);
        $admin->givePermissionTo(Permissions::UPDATE_MY_POST);
        $admin->givePermissionTo(Permissions::DELETE_MY_POST);

        $admin->givePermissionTo(Permissions::READ_ANY_POST);
        $admin->givePermissionTo(Permissions::UPDATE_ANY_POST);
        $admin->givePermissionTo(Permissions::DELETE_ANY_POST);

        $admin->givePermissionTo(Permissions::CREATE_ANY_ACCOUNT);
        $admin->givePermissionTo(Permissions::READ_ANY_ACCOUNT);
        $admin->givePermissionTo(Permissions::UPDATE_ANY_ACCOUNT);
        $admin->givePermissionTo(Permissions::DELETE_ANY_ACCOUNT);

        $admin->givePermissionTo(Permissions::CREATE_ANY_COMMENT);
        $admin->givePermissionTo(Permissions::READ_ANY_COMMENT);
        $admin->givePermissionTo(Permissions::UPDATE_ANY_COMMENT);
        $admin->givePermissionTo(Permissions::DELETE_ANY_COMMENT);

        $user->givePermissionTo(Permissions::VIEW_MY_PROFILE);
        $user->givePermissionTo(Permissions::UPDATE_MY_ACCOUNT);

        $user->givePermissionTo(Permissions::VIEW_ANY_POST);
        $user->givePermissionTo(Permissions::LIKE_ANY_POST);

        $user->givePermissionTo(Permissions::CREATE_NEW_POST);
        $user->givePermissionTo(Permissions::READ_MY_POST);
        $user->givePermissionTo(Permissions::UPDATE_MY_POST);
        $user->givePermissionTo(Permissions::DELETE_MY_POST);

        $user->givePermissionTo(Permissions::CREATE_ANY_COMMENT);
        $user->givePermissionTo(Permissions::READ_ANY_COMMENT);
    }
}
