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


}
