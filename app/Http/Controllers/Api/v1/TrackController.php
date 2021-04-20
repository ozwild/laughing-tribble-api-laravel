<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Account;
use App\Models\Track;
use Illuminate\Http\JsonResponse;

class TrackController extends ApiController
{
    public function getOne(Account $account, Track $track): JsonResponse
    {

        $track->load(['collection']);
        return $this->respond($track);
    }

    public function update(Account $account, Track $track):JsonResponse{
        $track->update(request()->except('id'));
        return $this->respond($track);
    }
}
