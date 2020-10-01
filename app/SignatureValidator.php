<?php

namespace App;

use Illuminate\Http\Request;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator as SignatureValidatorSignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class SignatureValidator implements SignatureValidatorSignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        return true;
    }
}
