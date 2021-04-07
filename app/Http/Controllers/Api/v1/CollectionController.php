<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Account;
use App\Models\Collection;
use Illuminate\Http\JsonResponse;

class CollectionController extends ApiController
{
    public function getOne(Account $account, Collection $collection): JsonResponse
    {

        $collection->load(['tracks.collection', 'account']);
        return $this->respond($collection);
    }
}
