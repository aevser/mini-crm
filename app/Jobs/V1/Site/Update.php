<?php

namespace App\Jobs\V1\Site;

use App\Models\Site;
use App\Services\LogService;
use Illuminate\Foundation\Queue\Queueable;

class Update
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $site_id,
        private string $name,
        private string $url,
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
        $site->update([
            'name' => $this->name,
            'url' => $this->url
        ]);

        LogService::log(
            site_id: $site->id,
            action: 'Сайт обновлен',
            details: [
                'id' => $site->id,
                'name' => $site->name,
                'url' => $site->url
            ]
        );

        return $site;
    }
}
