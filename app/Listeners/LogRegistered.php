<?php

namespace App\Listeners;

use Fusio\Sdk\Backend\User_Create;
use Fusio\Sdk\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;

class LogRegistered
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function handle(Registered $event)
    {
        $user = new User_Create();
        $user->setRoleId((int) config('fusio.role_id'));
        $user->setStatus(1);
        $user->setName($event->user->name);
        $user->setEmail($event->user->email);
        $user->setPassword(sha1($event->user->password));

        try {
            $response = $this->client->backend()->backendUser()->getBackendUser()->backendActionUserCreate($user);
            if ($response->getSuccess() !== true) {
                Log::warning('Could not create Fusio user: ' . $response->getMessage());
            }
        } catch (\Throwable $e) {
            Log::error('An error occurred at Fusio: ' . $e->getMessage());
        }
    }
}
