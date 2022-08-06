<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About

This is a sample Laravel application which integrates with the [Fusio Laravel SDK](https://github.com/apioo/fusio-sdk-php-laravel).
[Fusio](https://github.com/apioo/fusio) is an open source API management system which helps you to build and manage great
APIs. In this sample app we show how you can integrate Fusio into a Laravel app.

### Configuration

At first you need to configure the following settings at the `.env` file:

* `FUSIO_BASE_URI`
  * Contains an absolute url to your Fusio instance
* `FUSIO_APP_KEY/FUSIO_APP_SECRET`
  * Contains the credentials of an app or your admin account
* `FUSIO_ROLE_ID`
  * Contains the role id which is used in case the app creates a new user

### Workflow

Everytime a user registers at your Laravel-App we create a Fusio user in the background
s. `app/Listeners/LogRegistered.php`. The client uses the credentials from the configuration
so make sure that those credentials have the fitting permissions to create a user.

If a user authenticate at your Laravel-App we obtain an Access-Token from our Fusio instance
in the background and save the obtained Access-Token in the session s. `app/Listeners/LogLogin.php`
For further calls to the API we use then this Access-Token to work on behalf of the user.

As example we have implemented an Apps page at the dashboard where the user can manage and
control all apps. If a user creates a new app he obtains an App-Key/Secret which he can use
to access your Fusio API.
