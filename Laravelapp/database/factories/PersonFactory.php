<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonFactory extends Factory
{
    protected $model = Person::class;


    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'mail' => $this->faker->unique()->safeEmail,
            'age' => random_int(1, 99),
        ];
    }


}
