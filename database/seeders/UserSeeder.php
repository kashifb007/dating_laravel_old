<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'first_name' => 'Kashif',
            'last_name' => 'Bhatti',
            'email' => 'kash@dreamsites.co.uk',
            'password' => 'password123',
        ]);

        $user->addRole('super-admin');

        $user = User::factory()->create([
            'last_name' => 'Owner',
            'email' => 'owner@dreamsites.co.uk',
            'password' => 'password123',
        ]);

        $user->addRole('owner');

        $user = User::factory()->create([
            'last_name' => 'Admin',
            'email' => 'admin@dreamsites.co.uk',
            'password' => 'password123',
        ]);

        $user->addRole('admin');

        $user = User::factory()->create([
            'last_name' => 'Admin',
            'password' => 'password123',
        ]);

        $user->addRole('admin');

        $user = User::factory()->create([
            'last_name' => 'Admin',
            'password' => 'password123',
        ]);

        $user->addRole('admin');
    }
}
