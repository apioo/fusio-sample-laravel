<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>This page lists all available Apps for your account. If you create an App you obtain an App-Key
                    and App-Secret to access the API located at:</p>
                    <a href="{{ $apiUrl }}" class="underline text-blue-600">{{ $apiUrl }}</a>
                    <ul>
                    @foreach ($apps as $app)
                        <li>
                            <h1 class="font-bold mt-4"><a href="{{ route('apps_detail', [$app->getId()]) }}">{{ $app->getName() }}</a></h1>
                            <small>created on {{ $app->getDate() }}</small>
                        </li>
                    @endforeach
                    </ul>
                    <br>
                    <a href="{{ route('apps_create') }}">Create</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
