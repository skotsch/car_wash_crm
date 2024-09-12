<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Полная мойка',
                'price' => 2500.00,
                'description' => 'Полная мойка автомобиля, включая салон и двигатель.',
            ],
            [
                'name' => 'Мойка кузова',
                'price' => 500.00,
                'description' => 'Мойка только кузова автомобиля.',
            ],
            [
                'name' => 'Химчистка салона',
                'price' => 1500.00,
                'description' => 'Химчистка салона автомобиля.',
            ],
            [
                'name' => 'Полировка',
                'price' => 1000.00,
                'description' => 'Полировка кузова автомобиля.',
            ],
            [
                'name' => 'Чистка двигателя',
                'price' => 800.00,
                'description' => 'Чистка двигателя автомобиля.',
            ],
            [
                'name' => 'Чистка дисков',
                'price' => 600.00,
                'description' => 'Чистка дисков автомобиля.',
            ],
            [
                'name' => 'Покрытие воском',
                'price' => 700.00,
                'description' => 'Покрытие кузова автомобиля воском.',
            ],
            [
                'name' => 'Антидождь',
                'price' => 500.00,
                'description' => 'Нанесение антидождевого покрытия на стекла автомобиля.',
            ],
            [
                'name' => 'Чистка багажника',
                'price' => 400.00,
                'description' => 'Чистка багажника автомобиля.',
            ],
            [
                'name' => 'Чистка ковриков',
                'price' => 300.00,
                'description' => 'Чистка ковриков автомобиля.',
            ],
            [
                'name' => 'Чистка сидений',
                'price' => 700.00,
                'description' => 'Чистка сидений автомобиля.',
            ],
            [
                'name' => 'Чистка потолка',
                'price' => 500.00,
                'description' => 'Чистка потолка автомобиля.',
            ],
            [
                'name' => 'Чистка дверей',
                'price' => 600.00,
                'description' => 'Чистка дверей автомобиля.',
            ],
            [
                'name' => 'Чистка торпедо',
                'price' => 400.00,
                'description' => 'Чистка торпедо автомобиля.',
            ],
            [
                'name' => 'Чистка руля',
                'price' => 300.00,
                'description' => 'Чистка руля автомобиля.',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
