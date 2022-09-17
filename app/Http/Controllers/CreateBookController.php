<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Resources\BookResource;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CreateBookController extends Controller
{
    public function __invoke(BookService $bookService, CreateBookRequest $request): JsonResponse
    {
        return $this->respondWithSuccess([
            'data' => ['book' => BookResource::make($bookService->createBook($request->validated()))],
        ], ResponseAlias::HTTP_CREATED);
    }
}
