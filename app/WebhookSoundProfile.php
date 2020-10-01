<?php

namespace App;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookProfile\WebhookProfile;

class WebhookSoundProfile implements WebhookProfile
{
    public function shouldProcess(Request $request): bool
    {
        return true;
    }
}
