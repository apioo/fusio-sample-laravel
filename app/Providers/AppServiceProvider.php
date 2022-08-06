<?php

namespace App\Providers;

use Fusio\Laravel\SessionTokenStore;
use Fusio\Sdk\Consumer\Client as ConsumerClient;
use Illuminate\Contracts\Foundation\Application as App;
use Illuminate\Support\ServiceProvider;
use Sdkgen\Client\Credentials\ClientCredentials;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ConsumerClient::class, function (App $app) {
            // the token store already contains the token from the login event therefor we dont need to provide any credentials
            $credentials = new ClientCredentials('', '', config('fusio.base_uri') . '/authorization/token', '', config('fusio.base_uri') . '/authorization/refresh');
            return new ConsumerClient(config('fusio.base_uri'), $credentials, $app->get(SessionTokenStore::class));
        });
    }

    public function boot(): void
    {
    }
}
