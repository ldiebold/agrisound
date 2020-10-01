<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\ProcessWebhookJob as SpatieProcessWebhookJob;

class ProcessWebhookJob extends SpatieProcessWebhookJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        info($this->webhookCall['payload']);

        shell_exec('play ' . env('SOUNDS_DIRECTORY') . '/' . 'admin-deployed' . '.wav');

        if (array_key_exists('say', $this->webhookCall['payload'])) {
            shell_exec('say ' . $this->webhookCall['payload']['say']);
        }

        if (array_key_exists('play', $this->webhookCall['payload'])) {
            shell_exec('play ' . env('SOUNDS_DIRECTORY') . '/' . $this->webhookCall['payload']['play'] . '.wav');
        }
    }
}
