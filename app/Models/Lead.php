<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    protected $fillable = [
        'site_id',
        'name',
        'phone',
        'comment'
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
