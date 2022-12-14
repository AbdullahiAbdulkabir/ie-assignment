<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Psr\Log\LogLevel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<Throwable>, LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return $this->errorResponse(null, $e->getMessage(), Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof NotFoundHttpException) {
            return $this->errorResponse(null, 'The requested URL is invalid', Response::HTTP_NOT_FOUND);
        }
        return parent::render($request, $e);
    }

    private function errorResponse($data = null, $message = null, $statusCode = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        $response = [
            "status_code" => Response::HTTP_OK,
            "status" => 'success',
            "data" => []
        ];

        return response()->json($response, $statusCode);
    }
}
