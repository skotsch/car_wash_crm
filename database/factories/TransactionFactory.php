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
        // Получаем все существующие заказы
        $orders = Order::all();

        // Выбираем случайный заказ
        $order = $orders->random();
        foreach($orders as $order)
        {
            // Рассчитываем общую сумму заказа
            $totalAmount = $order->services->sum('price');

            return [
                'order_id' => $order->id,
                'amount' => $totalAmount,
                'payment_method' => $this->faker->randomElement(['Наличные', 'Карта', 'Перевод']),
            ];
        }


    }
}
