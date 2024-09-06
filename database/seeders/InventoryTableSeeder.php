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
                'price' => 20.00,
            ],
            [
                'name' => 'Шампунь для мойки',
                'description' => 'Шампунь для мойки автомобилей.',
                'type' => 'Химия',
                'price' => 10.00,
            ],
            [
                'name' => 'Щетка для мойки',
                'description' => 'Щетка для мойки автомобилей.',
                'type' => 'Инструмент',
                'price' => 5.00,
            ],
            [
                'name' => 'Воздуходувка',
                'description' => 'Воздуходувка для сушки автомобилей.',
                'type' => 'Оборудование',
                'price' => 30.00,
            ],
        ];

        foreach ($items as $item) {
            Inventory::create($item);
        }
    }
}
