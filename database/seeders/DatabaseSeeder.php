<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ClientsTableSeeder::class,
            EmployeesTableSeeder::class,
            RoomsTableSeeder::class,
            ServicesTableSeeder::class,
            InventoryTableSeeder::class,
            OrdersTableSeeder::class,
            OrderServiceTableSeeder::class,
            EmployeeOrderTableSeeder::class,
            RoomInventoryTableSeeder::class,
            TransactionsTableSeeder::class,
        ]);
    }
}
