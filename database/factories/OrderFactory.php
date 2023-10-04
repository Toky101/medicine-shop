<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        UserFactory::new()->count(1)->create();
        $user = User::where('is_admin', false)->where('address', '!=', null)->inRandomOrder()->first();
        $user_id = $user->id;
        $address = $user->address;

        return [
            //
            'user_id' => $user_id,
            'o_address' => $address,
            'o_status' => 'pending',
            'o_note' => $this->faker->text(100),
            'o_total_price' => rand(100, 1000),
            'o_payment_method' => 'cash',
            'o_payment_status' => 'pending',
            'o_phone' => $this->faker->phoneNumber,

        ];
    }
}
