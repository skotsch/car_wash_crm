<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Client;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'order_time' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'client_id' => Client::factory(),
            'room_id' => Room::factory(),
            'service_id' => Service::factory(),
        ];
    }
}
