<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Account;
use App\Models\Collection;
use App\Models\Track;
use Illuminate\Http\JsonResponse;
use App\Services\FileStorageService;

class TrackController extends ApiController
{
    public FileStorageService $fileStorageService;

    public function __construct(FileStorageService $fileStorageService)
    {
        $this->fileStorageService = $fileStorageService;
    }

    public function getOne(Account $account, Track $track): JsonResponse
    {
        $track->load(['collection']);
        return $this->respond($track);
    }

    public function create(Account $account, Collection $collection): JsonResponse
    {

        $data = request()->all();
        $track = $collection->tracks()->create($data);

        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $sourceURL = $this->fileStorageService->uploadTrack($track, $file);
            $track->update(['source' => $sourceURL]);
        }

        return $this->respond($track);
    }

    public function update(Account $account, Collection $collection, Track $track): JsonResponse
    {
        $data = request()->all();
        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $sourceURL = $this->fileStorageService->uploadTrack($track, $file);
            $data['source'] = $sourceURL;
        }

        $track->update($data);

        return $this->respond($track);
    }
}
