<?php

namespace App\Http\Controllers;

use Fusio\Sdk\Consumer\App_Create;
use Fusio\Sdk\Consumer\Client as ConsumerClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AppsController extends Controller
{
    private ConsumerClient $client;

    public function __construct(ConsumerClient $client)
    {
        $this->client = $client;
    }

    public function show()
    {
        try {
            $collection = $this->client->consumerApp()->getConsumerApp()->consumerActionAppGetAll();
            $apps = $collection->getEntry() ?? [];
        } catch (\Throwable $e) {
            Log::error('An error occurred at Fusio: ' . $e->getMessage());

            $apps = [];
        }

        return view('apps.list', [
            'apiUrl' => config('fusio.base_uri'),
            'apps' => $apps,
        ]);
    }

    public function detail($id)
    {
        try {
            $app = $this->client->consumerApp()->getConsumerAppByAppId($id)->consumerActionAppGet();
        } catch (\Throwable $e) {
            Log::error('An error occurred at Fusio: ' . $e->getMessage());

            return redirect('apps');
        }

        return view('apps.detail', [
            'app' => $app,
        ]);
    }

    public function create()
    {
        try {
            $collection = $this->client->consumerScope()->getConsumerScope()->consumerActionScopeGetAll();
            $scopes = $collection->getEntry() ?? [];
        } catch (\Throwable $e) {
            Log::error('An error occurred at Fusio: ' . $e->getMessage());

            $scopes = [];
        }

        return view('apps.create', [
            'scopes' => $scopes
        ]);
    }

    public function submit(Request $request)
    {
        try {
            $app = new App_Create();
            $app->setName($request->input('name'));
            $app->setUrl($request->input('url'));
            $app->setScopes($request->input('scopes'));

            $message = $this->client->consumerApp()->getConsumerApp()->consumerActionAppCreate($app);
            if ($message->getSuccess() === true) {
                return redirect('apps');
            } else {
                return view('apps.error', [
                    'message' => $message->getMessage()
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('An error occurred at Fusio: ' . $e->getMessage());

            return view('apps.error', [
                'message' => $e->getMessage()
            ]);
        }
    }
}
