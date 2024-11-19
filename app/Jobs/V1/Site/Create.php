<?php

namespace App\Jobs\V1\Site;

use App\Models\Site;
use App\Services\LogService;
use Illuminate\Foundation\Queue\Queueable;

class Create
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private string $name,
        private string $url,
        private string $api_token
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $site = Site::create([
            'name' => $this->name,
            'url' => $this->url,
            'api_token' => $this->api_token,
        ]);

        LogService::log(
            site_id: $site->id,
            action: 'Сайт добавлен',
            details: [
                'id' => $site->id,
                'name' => $site->name,
                'url' => $site->url,
                'api_token' => $site->api_token
            ]
        );

        return $site;
    }
}
