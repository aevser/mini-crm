<?php

namespace App\Jobs\V1\Site;

use App\Models\Site;
use App\Services\LogService;
use Illuminate\Foundation\Queue\Queueable;

class Delete
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $site_id
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $site = Site::findOrFail($this->site_id);

        LogService::log(
            site_id: $site->id,
            action: 'Сайт удален',
            details: [
                'id' => $site->id,
                'name' => $site->name,
                'url' => $site->url
            ]
        );

        $site->delete();
    }
}
