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
                    <form method="POST" action="{{ route('apps_submit') }}">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        <div>
                            <x-label for="url" :value="__('Url')" />
                            <x-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')" required />
                        </div>
                        <div>
                            <x-label :value="__('Scopes')" />
                            @foreach ($scopes as $scope)
                                <label><x-input type="checkbox" name="scopes[]" value="{{ $scope->getName() }}" class="" /> {{ $scope->getName() }}</label>
                            @endforeach
                        </div>
                        <x-button class="ml-3">
                            {{ __('Submit') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
