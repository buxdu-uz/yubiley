<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateorcreate([
            'name' => 'admin'
        ]);

        Role::updateorcreate([
            'name' => 'manager'
        ]);

        Role::updateorcreate([
            'name' => 'user'
        ],[
            'guard_name' => 'person'
        ]);

        $admin = User::updateOrCreate([
            'login' => 'admin'
        ],[
            'name' => 'Admin',
            'password' => 'admin'
        ]);

        $admin->assignRole('admin','manager');

        $manager = User::updateOrCreate([
            'login' => 'manager'
        ],[
            'name' => 'Manager',
            'password' => 'manager'
        ]);
        $manager->assignRole('manager');
    }
}
