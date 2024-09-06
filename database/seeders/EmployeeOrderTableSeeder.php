<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Employee;

class EmployeeOrderTableSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::all();
        $employees = Employee::all();

        foreach ($orders as $order) {
            $order->employees()->attach(
                $employees->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
