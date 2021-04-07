<?php

namespace App\Models;

use App\Traits\UsesUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Account extends Model
{
    use HasFactory, UsesUuids;

    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class);
    }

    public function tracks(): HasManyThrough
    {
        return $this->hasManyThrough(Track::class, Collection::class);
    }
}
