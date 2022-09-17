<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DeleteBookController extends Controller
{
    public function __invoke(BookService $bookService, Book $book): JsonResponse
    {
        $bookService->deleteBook($book);

        return response()->json([
            'status_code' => ResponseAlias::HTTP_NO_CONTENT,
            'status' => 'success',
            'message' => "The book '{$book->name}' was deleted successfully",
            'data' => []
        ]);
    }
}
