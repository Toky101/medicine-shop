<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 regular users
        UserFactory::new()->count(5)->create();
        // User::factory(5)->create();
        // Create a regular user
        // User::create([
        //     'name' => 'Regular User',
        //     'email' => 'user@example.com',
        //     'address' => '123 Main St, Anytown, USA', // Add this line
        //     'password' => Hash::make('password'),
        //     'is_admin' => false, // Not an admin
        // ]);

        // // Create an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'address' => '124 Main St, Anytown, USA', // Add this line
            'password' => Hash::make('aaa'),
            'is_admin' => true, // Admin user
        ]);
    }
}
