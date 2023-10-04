<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\MedicineFactory;
use Illuminate\Database\Seeder;

class MedicineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // MedicineFactory::new()->count(10)->create();
        // MedicineFactory::new()->count(10)->create([
        //     'm_image' => 'default.jpg',
        // ]);
        MedicineFactory::new()->count(10)->create()->each(function ($medicine) {
            $categories = Category::all()->random(mt_rand(1, 3))->pluck('id');
            $medicine->categories()->attach($categories);
        });
    }
}
