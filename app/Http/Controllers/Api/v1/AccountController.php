<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Account;
use App\Models\Collection;
use App\Models\Track;
use Illuminate\Http\JsonResponse;

class AccountController extends ApiController
{
    public function getOne(Account $account): JsonResponse
    {
        return $this->respond($account);
    }

    public function tracks(): JsonResponse
    {
        $tracks = Track::orderByDesc('created_at')->get();
        $tracks->load(['collection']);
        return $this->respond($tracks);
    }

    public function collections(): JsonResponse
    {
        $collections = Collection::orderByDesc('created_at')->get();
        $collections->load(['tracks']);
        return $this->respond($collections);
    }
}
