<?php

namespace App\Models;

use App\Traits\UsesUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\Storage;

class Track extends Model
{
    use HasFactory, UsesUuids;

    protected $fillable = ['title', 'key', 'bpm', 'duration', 'lyrics', 'source', 'type', 'collection_id'];

    protected $appends = ['audio_url'];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function getAccountAttribute()
    {
        return $this->collection->account;
    }

    public function getAudioUrlAttribute()
    {
        return $this->source ? Storage::disk('s3')->url($this->source) : $this->source;
    }
}
