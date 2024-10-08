<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventoryTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'name' => 'Шланг для мойки',
                'description' => 'Шланг для мойки автомобилей.',
                'type' => 'Шланг',
                'price' => 2000.00,
            ],
            [
                'name' => 'Шампунь для мойки',
                'description' => 'Шампунь для мойки автомобилей.',
                'type' => 'Химия',
                'price' => 1000.00,
            ],
            [
                'name' => 'Щетка для мойки',
                'description' => 'Щетка для мойки автомобилей.',
                'type' => 'Инструмент',
                'price' => 500.00,
            ],
            [
                'name' => 'Воздуходувка',
                'description' => 'Воздуходувка для сушки автомобилей.',
                'type' => 'Оборудование',
                'price' => 3000.00,
            ],
            [
                'name' => 'Пылесос для салона',
                'description' => 'Пылесос для очистки салона автомобиля.',
                'type' => 'Оборудование',
                'price' => 2500.00,
            ],
            [
                'name' => 'Средство для полировки',
                'description' => 'Средство для полировки кузова автомобиля.',
                'type' => 'Химия',
                'price' => 1200.00,
            ],
            [
                'name' => 'Губка для мойки',
                'description' => 'Губка для мягкой мойки автомобиля.',
                'type' => 'Инструмент',
                'price' => 300.00,
            ],
            [
                'name' => 'Средство для чистки ковров',
                'description' => 'Средство для чистки ковров в салоне автомобиля.',
                'type' => 'Химия',
                'price' => 800.00,
            ],
            [
                'name' => 'Средство для чистки стекол',
                'description' => 'Средство для чистки стекол автомобиля.',
                'type' => 'Химия',
                'price' => 600.00,
            ],
            [
                'name' => 'Средство для удаления битума',
                'description' => 'Средство для удаления битума с кузова автомобиля.',
                'type' => 'Химия',
                'price' => 900.00,
            ],
            [
                'name' => 'Средство для удаления ржавчины',
                'description' => 'Средство для удаления ржавчины с кузова автомобиля.',
                'type' => 'Химия',
                'price' => 1100.00,
            ],
            [
                'name' => 'Средство для удаления жира',
                'description' => 'Средство для удаления жира с кузова автомобиля.',
                'type' => 'Химия',
                'price' => 700.00,
            ],
            [
                'name' => 'Средство для удаления пятен',
                'description' => 'Средство для удаления пятен с кузова автомобиля.',
                'type' => 'Химия',
                'price' => 1300.00,
            ],
            [
                'name' => 'Средство для удаления следов от насекомых',
                'description' => 'Средство для удаления следов от насекомых с кузова автомобиля.',
                'type' => 'Химия',
                'price' => 1400.00,
            ],
        ];

        foreach ($items as $item) {
            Inventory::create($item);
        }
    }
}
