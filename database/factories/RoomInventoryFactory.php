<?php

namespace Database\Factories;

use App\Models\RoomInventory;
use App\Models\Room;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomInventoryFactory extends Factory
{
    protected $model = RoomInventory::class;

    public function definition()
    {
        return [
            'room_id' => Room::factory(),
            'inventory_id' => Inventory::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
