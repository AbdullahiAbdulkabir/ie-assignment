<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;

class UpdateBookController extends Controller
{
    public function __invoke(BookService $bookService, Book $book, UpdateBookRequest $request): JsonResponse
    {
        $bookService->updateBook($book, $request->validated());

        return $this->respondWithSuccess([
            'message' => "The book '{$book->name}' was updated successfully",
            'data' => BookResource::collection($bookService->listBooks()),
        ]);

    }
}
