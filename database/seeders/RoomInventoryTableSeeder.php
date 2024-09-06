<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomInventory;

class RoomInventoryTableSeeder extends Seeder
{
    public function run()
    {
        RoomInventory::factory()->count(10)->create();
    }
}
