<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'authors' => $this->faker->name(),
            'isbn' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'number_of_pages' => $this->faker->numberBetween(0,50),
            'publisher' => $this->faker->name(),
            'release_date' => $this->faker->date(),
        ];
    }
}
