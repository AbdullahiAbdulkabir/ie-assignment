<?php

namespace Tests\Feature\Http;

use Tests\TestCase;

class CreateBookControllerTest extends TestCase
{
    public function testCreateBook()
    {
        $p = $this->postJson("$this->apiUrl/v1/books", [
            'name' => $this->faker->name(),
            'authors' => ([$this->faker->name()]),
            'isbn' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'number_of_pages' => $this->faker->numberBetween(0,50),
            'publisher' => $this->faker->name(),
            'release_date' => $this->faker->date(),
        ]);

        $this->assertDatabaseHas('books', [
            'id' => $p['data']['book']['id'],
        ]);

        $p->assertCreated();

        $p->assertJsonStructure([
            'status',
            'status_code',
            'data',
        ]);

    }

    public function testCreateValidationFailBook()
    {
        $p = $this->postJson("$this->apiUrl/v1/books", [
            'name' => $this->faker->name(),
            'authors' => $this->faker->name(),
            'isbn' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'number_of_pages' => $this->faker->numberBetween(0,50),
            'publisher' => $this->faker->name(),
            'release_date' => $this->faker->date(),
        ]);

        $p->assertUnprocessable();

    }
}
