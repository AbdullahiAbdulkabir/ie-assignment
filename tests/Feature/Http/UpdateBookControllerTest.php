<?php

namespace Tests\Feature\Http;

use App\Models\Book;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateBookControllerTest extends TestCase
{
    public function testGetBook()
    {
        $book = Book::factory()->create();
        $request = $this->patchJson("$this->apiUrl/v1/books/{$book->id}", [
            'name' => $name = $this->faker->name,
            'country' => $this->faker->country(),
            'authors' => [$book->authors],
            'isbn' => $book->isbn,
            'number_of_pages' => $book->number_of_pages,
            'publisher' => $book->publisher,
            'release_date' => $book->release_date,
        ]);
        $request->assertOk();
        $request->assertJson([
            'status_code' => Response::HTTP_OK,
            'status' => 'success',
            'message' => "The book '{$book->name}' was updated successfully",
            'data' =>
            [
                'id' => $book->id,
                'name' => $book->name,
                'country' => $book->country,
            ]
        ]);
        $this->assertDatabaseHas('books', [
            'name' => $name,
        ]);


    }

    public function testCreateValidationFailBook()
    {
        $p = $this->postJson("$this->apiUrl/v1/books", [
            'name' => $this->faker->name(),
            'authors' => $this->faker->name(),
            'isbn' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'number_of_pages' => $this->faker->numberBetween(0, 50),
            'publisher' => $this->faker->name(),
            'release_date' => $this->faker->date(),
        ]);

        $p->assertUnprocessable();

    }
}
