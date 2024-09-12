<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        // Создаем заказ с услугами
        $order = Order::factory()->hasServices(3)->create();

        // Рассчитываем общую сумму заказа
        $totalAmount = $order->services->sum('price');

        return [
            'order_id' => $order->id,
            'amount' => $totalAmount,
            'payment_method' => $this->faker->randomElement(['Карта', 'Наличная', 'Онлайн']),
        ];
    }
}
