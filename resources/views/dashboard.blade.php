<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="mb-2">You're logged in! This is just an empty dashboard, please take a look at the following
                    pages:</p>
                    <dl>
                        <dt class="font-bold mt-4"><a href="{{ route('apps') }}">Apps</a></dt>
                        <dd>Provides a way to manage all Apps of your account</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
