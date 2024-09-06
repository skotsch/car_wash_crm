<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        $addresses = [
            '123 Main St',
            '456 Elm St',
            '789 Oak St',
            '101 Pine St',
        ];

        foreach ($addresses as $address) {
            Room::create(['address' => $address]);
        }
    }
}
