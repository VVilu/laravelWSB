<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\people>
 */
class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        return [
            'Name'=>$name,
            'Last_name'=>$this->faker->lastName(),
            'Phone_number'=>$this->faker->phoneNumber(),
            'Street'=>$this->faker->streetName(),
            'City'=>$this->faker->city(),
            'Country'=>$this->faker->country(),
        ];
    }
}
