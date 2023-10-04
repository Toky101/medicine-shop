<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OrderItem::class;

    public function definition(): array
    {
        OrderFactory::new()->count(1)->create();
        MedicineFactory::new()->count(1)->create()->each(function ($medicine) {
            $categories = Category::all()->random(mt_rand(1, 3))->pluck('id');
            $medicine->categories()->attach($categories);
        });

        $order = Order::inRandomOrder()->first();
        $medicine = Medicine::inRandomOrder()->first();

        return [
            'order_id' => $order->id,
            'medicine_id' => $medicine->id,
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $medicine->m_price,
        ];
    }
}
