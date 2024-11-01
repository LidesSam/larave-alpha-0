<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class InitialUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles if they don't already exist
        $developerRole = Role::firstOrCreate(['name' => 'developer']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create permissions if they don't already exist
        $manageUsersPermission = Permission::firstOrCreate(['name' => 'manage users']);
        $manageRolesPermission = Permission::firstOrCreate(['name' => 'manage roles']);

        // Assign permissions to roles
        $developerRole->givePermissionTo($manageUsersPermission);
        $adminRole->givePermissionTo($manageUsersPermission);
        $adminRole->givePermissionTo($manageRolesPermission);

        // Create default developer user if not exists
        $developer = User::firstOrCreate(
            ['email' => 'lides.sam@gmail.com'],
            [
                'name' => 'Developer User',
                'password' => Hash::make('admin') // change the password as needed
            ]
        );
        $developer->assignRole($developerRole);

        // Create default admin user if not exists
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password') // change the password as needed
            ]
        );
        $admin->assignRole($adminRole);
    }
}
