<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    use WithFaker, CreatesApplication, RefreshDatabase;

    protected string $apiUrl = "api";

    protected function setUp(): void
    {
        parent::setUp();
        TestResponse::macro('assertResource', function ($resource) {
            $this->assertJson($resource->response()->getData(true));
        });
    }
}
