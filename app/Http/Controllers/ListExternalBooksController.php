<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExternalBookResource;
use App\Services\BookService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ListExternalBooksController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function __invoke(BookService $bookService): JsonResponse
    {
        $request = request()->all();
        $isEmpty = empty($bookService->listExternalBooks($request));
        return $this->respondWithSuccess([
            'data' => ExternalBookResource::collection($bookService->listExternalBooks($request)),
        ], $isEmpty ? ResponseAlias::HTTP_NOT_FOUND : ResponseAlias::HTTP_OK,
            $isEmpty ? 'not found' : 'success');
    }
}
