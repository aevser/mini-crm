<?php

namespace App\Services;

use App\Models\Log;

class LogService
{
    public static function log(int $site_id, string $action, array $details = []): void
    {
        Log::create([
            'site_id' => $site_id,
            'action' => $action,
            'details' => $details,
        ]);
    }
}
