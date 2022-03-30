<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'update profile']);
        Permission::create(['name' => 'update password']);
        Permission::create(['name' => 'delete account']);
        Permission::create(['name' => 'base']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'edit permission']);
        Permission::create(['name' => 'show permssion']);
        Permission::create(['name' => 'delete permission']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'show role']);
        Permission::create(['name' => 'delete role']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'User']);
        $role1->givePermissionTo('update profile');
        $role1->givePermissionTo('update password');
        $role1->givePermissionTo('delete account');
        $role1->givePermissionTo('base');

        $role2 = Role::create(['name' => 'Super Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user1 = User::factory()->create([
            'name' => 'Ms. Margarette Jenkins',
            'email' => 'terrell.kihn@example.net',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user2 = User::factory()->create([
            'name' => 'Liana Bednar',
            'email' => 'colin.medhurst@example.org',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user1->assignRole('Super Admin');
        $user2->assignRole($role1);
    }
}
