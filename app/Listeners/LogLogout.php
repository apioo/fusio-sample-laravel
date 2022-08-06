<?php

namespace App\Listeners;

use Fusio\Laravel\SessionTokenStore;
use Illuminate\Auth\Events\Logout;
use Sdkgen\Client\TokenStoreInterface;

class LogLogout
{
    private TokenStoreInterface $tokenStore;

    public function __construct(SessionTokenStore $tokenStore)
    {
        $this->tokenStore = $tokenStore;
    }

    public function handle(Logout $event)
    {
        $this->tokenStore->remove();
    }
}
