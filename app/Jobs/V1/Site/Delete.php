<?php

namespace App\Jobs\V1\Site;

use App\Models\Site;
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
        return Site::destroy($this->site_id);
    }
}
