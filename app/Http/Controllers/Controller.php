<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected int $statusCode = ResponseAlias::HTTP_OK;

    public function setStatusCode($statusCode): static
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Return JsonResponse
     * @param $data
     * @return JsonResponse
     */
    public function jsonResponse($data): JsonResponse
    {
        return response()->json(array_merge($data, ['status_code' => $this->statusCode]), $this->statusCode);
    }

    public function respondWithSuccess($data, $statusCode = ResponseAlias::HTTP_OK, $statusMessage = 'success'): JsonResponse
    {
        return $this->setStatusCode($statusCode)->jsonResponse(is_array($data) ?
            array_merge(['status_code' => $statusCode,
                'status' => $statusMessage], $data) : ['message' => $data]);
    }
}
