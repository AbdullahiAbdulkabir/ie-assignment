<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;

class ListBooksController extends Controller
{
    public function __invoke(BookService $bookService): JsonResponse
    {
        return $this->respondWithSuccess([
            'data' => BookResource::collection($bookService->listBooks()),
        ]);
    }
}
