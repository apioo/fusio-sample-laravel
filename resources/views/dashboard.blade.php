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
                    <p class="mb-2">You're logged in! This is a sample Laravel application which integrates with the <a href="https://github.com/apioo/fusio-sdk-php-laravel" class="underline text-blue-600">Fusio Laravel SDK</a>.
                    <a href="https://github.com/apioo/fusio" class="underline text-blue-600">Fusio</a> is an open source API management system which
                    helps you to build and manage great APIs. In this sample app we show how you can integrate Fusio
                    into a Laravel app.</p>

                    <h1 class="font-bold text-xl my-4">Configuration</h1>
                    <p class="mb-2">At first you need to configure the following settings at the <code>.env</code> file:</p>

                    <dl>
                        <dt class="font-bold mt-4">FUSIO_BASE_URI</dt>
                        <dd>Contains an absolute url to your Fusio instance</dd>
                        <dt class="font-bold mt-4">FUSIO_APP_KEY/FUSIO_APP_SECRET</dt>
                        <dd>Contains the credentials of an app or your admin account</dd>
                        <dt class="font-bold mt-4">FUSIO_ROLE_ID</dt>
                        <dd>Contains the role id which is used in case the app creates a new user</dd>
                    </dl>

                    <h1 class="font-bold text-xl my-4">Workflow</h1>

                    <p class="my-2">Everytime a user registers at your Laravel-App we create a Fusio user in the background
                    s. <code>app/Listeners/LogRegistered.php</code>>. The client uses the credentials from the configuration
                    so make sure that those credentials have the fitting permissions to create a user.</p>

                    <p class="my-2">If a user authenticates at your Laravel-App we obtain an Access-Token from our Fusio instance
                    in the background and save the obtained Access-Token in the session s. <code>app/Listeners/LogLogin.php</code>>
                    For further calls to the API we use then this Access-Token to work on behalf of the authenticated user.</p>

                    <p>As example we have implemented an Apps page at the dashboard where the user can manage and
                    control all apps. If a user creates a new app he obtains an App-Key/Secret which he can use
                    to access your Fusio API.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
