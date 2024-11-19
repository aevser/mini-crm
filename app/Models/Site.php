<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    protected $fillable = [
        'name',
        'url',
        'api_token'
    ];

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }
}
