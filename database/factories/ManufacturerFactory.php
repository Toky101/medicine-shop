<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Manufacturer::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new MyFactory($faker));

        return [
            //
            'mn_name' => $faker->manufacturer,
        ];
    }
}
