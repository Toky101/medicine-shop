<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    protected $model = Medicine::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Medicine($faker));
        $manufacturer = Manufacturer::inRandomOrder()->first();

        return [
            'm_name' => $faker->medicine,
            'm_slug' => $faker->slug,
            'm_description' => $faker->sentence,
            'm_price' => $this->faker->randomFloat(2, 5, 100),
            'm_image' => 'medicines/medicine_default.jpg', // You may want to customize this for actual images
            'm_quantity' => $this->faker->numberBetween(10, 200),
            'manufacturer_id' => $manufacturer->id,
        ];
    }
}
