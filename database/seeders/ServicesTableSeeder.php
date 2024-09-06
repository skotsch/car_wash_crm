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
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
