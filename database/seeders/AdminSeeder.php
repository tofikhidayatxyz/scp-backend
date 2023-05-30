<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.app',
            'password' => bcrypt('secret'),
        ]);

        $admin->roles()->attach($adminRole);
    }
}
