<?php

namespace Tests\Feature\Http;


use App\Models\Book;
use Tests\TestCase;

class DeleteBookControllerTest extends TestCase
{

    public function testDeleteBook()
    {
        $book = Book::factory()->create();

        $p = $this->deleteJson("$this->apiUrl/v1/books/{$book->id}");

        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);

        $p->assertJsonStructure([
            'status',
            'message',
            'status_code',
            'data',
        ]);

    }


}
