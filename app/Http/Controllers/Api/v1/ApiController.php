<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function respond($response, $statusCode = 200): JsonResponse
    {
        return response()->json($response, $statusCode);
    }

    public function respondCreated($response = null): JsonResponse
    {
        return $this->respond($response, 201);
    }

    public function respondUpdated($response = null): JsonResponse
    {
        return $response ?
            $this->respond($response, 201) :
            $this->respond($response, 204);
    }

    public function respondDeleted(): JsonResponse
    {
        return $this->respond(null, 204);
    }
}
