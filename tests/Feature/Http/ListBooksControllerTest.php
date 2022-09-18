<?php

namespace Tests\Feature\Http;

use App\Models\Book;
use Tests\TestCase;

class ListBooksControllerTest extends TestCase
{

    public function testListBooks()
    {
        Book::factory()->count(3)->create();

        $details = $this->getJson("$this->apiUrl/v1/books");

        $details->assertOk();
        $details->assertJsonCount(3, 'data');

    }


}
