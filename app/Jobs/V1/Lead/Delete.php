<?php

namespace App\Jobs\V1\Lead;

use App\Models\Lead;
use App\Services\LogService;
use Illuminate\Foundation\Queue\Queueable;

class Delete
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $lead_id
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $lead = Lead::findOrFail($this->lead_id);

        LogService::log(
            site_id: $lead->id,
            action: 'Лид удален',
            details: [
                'id' => $lead->id,
                'name' => $lead->name,
                'phone' => $lead->phone,
                'comment' => $lead->comment
            ]
        );

        return $lead->delete();
    }
}
