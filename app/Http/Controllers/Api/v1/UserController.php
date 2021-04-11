<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Account;
use App\Models\Collection;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends ApiController
{
    public function getOne(User $user): JsonResponse
    {
        $user->load(['accounts']);
        return $this->respond($user);
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
