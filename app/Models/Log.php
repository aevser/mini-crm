<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    protected $fillable = [
        'site_id',
        'action',
        'details'
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}