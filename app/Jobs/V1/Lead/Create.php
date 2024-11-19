<?php

namespace App\Jobs\V1\Lead;

use App\Models\Lead;
use Illuminate\Foundation\Queue\Queueable;

class Create
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $site_id,
        private string $name,
        private string $phone,
        private string $comment
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $lead = Lead::create([
            'site_id' => $this->site_id,
            'name' => $this->name,
            'phone' => $this->phone,
            'comment' => $this->comment,
        ]);

        return $lead;
    }
}
