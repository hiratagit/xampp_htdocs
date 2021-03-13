<?php

namespace Database\Factories;

use App\Models\Friend;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FriendsFactory extends Factory
{

    protected $model = Friend::class;

    public function definition()
    {
        return [
            'last_name' => $this->faker->lastname,
            'first_name' => $this->faker->firstname,
            'age' => $this->faker->numberBetween(8, 80),
            'email' => $this->faker->unique()->safeEmail,
            'postal' => $this->faker->postcode,
            'address' => $this->faker->address,
            'tel' => $this->faker->phoneNumber,
        ];
    }
}
