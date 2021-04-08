<?php

namespace App\Models;

use App\Traits\UsesUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory, UsesUuids;

    protected $fillable = ['title', 'art_url'];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    /*public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class);
    }*/
}
