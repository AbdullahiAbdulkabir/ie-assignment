<?php

namespace Tests\Feature\Http;

use Tests\TestCase;

class ListExternalBooksControllerTest extends TestCase
{

    public function testListExternalBooks()
    {
        $list = $this->getJson("$this->apiUrl/external-books");

        $list->assertOk();
        $list->assertJsonCount(10, 'data');

        $list->assertJsonStructure([
            'status',
            'status_code',
            'data',
        ]);

    }

    public function testGetExternalBook()
    {
        $list = $this->getJson("$this->apiUrl/external-books?name=A%20Feast%20for%20Crows");

        $list->assertOk();
        $list->assertJsonCount(1, 'data');


    }


}
