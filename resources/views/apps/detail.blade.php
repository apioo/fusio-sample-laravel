<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apps') }} / {{ $app->getName() }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold"><a href="{{ route('apps_detail', [$app->getId()]) }}">{{ $app->getName() }}</a></h1>
                    <small>created on {{ $app->getDate() }}</small>
                    <dl>
                        <dt class="font-bold mt-4">App-Key</dt>
                        <dd>{{ $app->getAppKey() }}</dd>
                        <dt class="font-bold mt-4">App-Secret</dt>
                        <dd>{{ $app->getAppSecret() }}</dd>
                        <dt class="font-bold mt-4">Scopes</dt>
                        <dd>{{ implode(', ', $app->getScopes() ?? []) }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
