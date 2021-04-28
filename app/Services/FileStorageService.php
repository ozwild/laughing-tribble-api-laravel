<?php

namespace App\Services;

use App\Models\Track;
use Illuminate\Http\UploadedFile;

class FileStorageService
{
    public function uploadTrack(Track $track, UploadedFile $file)
    {
        if ($file->getMimeType() !== "audio/mpeg") {
            return null;
        }
        return $file->storeAs("audio/{$track->account->id}", "{$track->id}.mp3", 's3');
    }
}
