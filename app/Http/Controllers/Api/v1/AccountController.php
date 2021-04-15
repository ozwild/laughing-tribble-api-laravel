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

        $query = Track::query();
        if ($collectionId = request()->input('collectionId')) {
            $query->where('collection_id', $collectionId);
        }
        $query->orderByDesc('created_at');
        $tracks = $query->get();
        $tracks->load(['collection']);
        return $this->respond($tracks);
    }

    public function collections(Account $account): JsonResponse
    {
        $collections = $account->collections()->orderBy('title')->get();
        /* $collections = Collection::orderByDesc('created_at')->get(); */
        $collections->load(['tracks']);
        return $this->respond($collections);
    }
}
