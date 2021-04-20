<?php

namespace App\Models;

use App\Traits\UsesUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Track extends Model
{
    use HasFactory, UsesUuids;

    protected $fillable = ['title', 'key', 'bpm', 'duration', 'lyrics', 'source', 'type','collection_id'];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    /*public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class);
    }*/
}
