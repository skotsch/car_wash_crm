<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
