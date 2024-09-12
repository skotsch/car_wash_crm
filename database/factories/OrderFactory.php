<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Client;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        $clients = Client::pluck('id')->toArray();
        $rooms = Room::pluck('id')->toArray();

        return [
            'status' => $this->faker->randomElement(['В обработке', 'Завершён', 'Отменён']),
            'order_time' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'client_id' => $this->faker->randomElement($clients),
            'room_id' => $this->faker->randomElement($rooms),
        ];
    }
}
