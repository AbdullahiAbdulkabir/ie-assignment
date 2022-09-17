<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;

class GetBookController extends Controller
{
    public function __invoke(BookService $bookService, Book $book): JsonResponse
    {
        return $this->respondWithSuccess([
            'data' => BookResource::make($bookService->getBook($book)),
        ]);
    }
}
