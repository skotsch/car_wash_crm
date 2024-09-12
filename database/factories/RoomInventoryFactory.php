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
        $rooms = Room::pluck('id')->toArray();
        $inventories = Inventory::pluck('id')->toArray();
        return [
            'room_id' => $this->faker->randomElement($rooms),
            'inventory_id' => $this->faker->randomElement($inventories),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
