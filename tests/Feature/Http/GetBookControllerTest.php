<?php

namespace Tests\Feature\Http;

use App\Models\Book;
use Illuminate\Support\Str;
use Tests\TestCase;

class GetBookControllerTest extends TestCase
{
    public function testGetBook()
    {
        $book = Book::factory()->create();
        $result = $this->getJson("$this->apiUrl/v1/books/{$book->id}");
        $result->assertOk();

        $result->assertJsonStructure([
            'status',
            'status_code',
            'data',
        ]);

    }

    public function testBookNotFound()
    {
        $book = Str::uuid();
        $books = $this->getJson("$this->apiUrl/v1/books/{$book}");

        $books->assertNotFound();
    }
}
