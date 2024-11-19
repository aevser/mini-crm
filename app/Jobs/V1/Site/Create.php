<?php

namespace App\Jobs\V1\Site;

use App\Models\Site;
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

        return $site;
    }
}
