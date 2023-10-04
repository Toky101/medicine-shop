<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new MyFactory($faker));

        return [
            'name' => $faker->category,
            'description' => $faker->sentence,
            'slug' => $faker->slug,
            'image' => $faker->imageUrl(640, 480, 'cats'),
        ];
    }
}
