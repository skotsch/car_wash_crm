<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Service;

class OrderServiceTableSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::all();
        $services = Service::all();

        foreach ($orders as $order) {
            $order->services()->attach(
                $services->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
