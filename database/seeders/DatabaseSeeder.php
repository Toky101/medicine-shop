<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Database\Factories\CategoryFactory;
use Database\Factories\ManufacturerFactory;
use Database\Factories\MedicineFactory;
use Database\Factories\OrderFactory;
use Database\Factories\OrderItemFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        CategoryFactory::new()->count(3)->create();
        ManufacturerFactory::new()->count(10)->create();
        MedicineFactory::new()->count(10)->create()->each(function ($medicine) {
            $categories = Category::all()->random(mt_rand(1, 3))->pluck('id');
            $medicine->categories()->attach($categories);
        });

        UserFactory::new()->count(5)->create();
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'address' => '124 Main St, Anytown, USA', // Add this line
            'password' => Hash::make('aaa'),
            'is_admin' => true, // Admin user
        ]);
        OrderFactory::new()->count(5)->create();
        OrderItemFactory::new()->count(5)->create();

    }
}
