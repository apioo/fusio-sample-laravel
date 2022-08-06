<?php

namespace App\Listeners;

use Fusio\Laravel\SessionTokenStore;
use Fusio\Sdk\Client;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
use Sdkgen\Client\TokenStoreInterface;

class LogLogin
{
    private TokenStoreInterface $tokenStore;

    public function __construct(SessionTokenStore $tokenStore)
    {
        $this->tokenStore = $tokenStore;
    }

    public function handle(Login $event)
    {
        try {
            $client = new Client(config('fusio.base_uri'), $event->user->name, sha1($event->user->password), null, $this->tokenStore);
            $account = $client->consumer()->consumerUser()->getConsumerAccount()->consumerActionUserGet();

            Log::info('Authenticated user at Fusio: ' . $account->getName());
        } catch (\Throwable $e) {
            Log::error('An error occurred at Fusio: ' . $e->getMessage());
        }
    }
}
