<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/apps', [\App\Http\Controllers\AppsController::class, 'show'])->middleware(['auth'])->name('apps');

Route::get('/apps/create', [\App\Http\Controllers\AppsController::class, 'create'])->middleware(['auth'])->name('apps_create');
Route::post('/apps/create', [\App\Http\Controllers\AppsController::class, 'submit'])->middleware(['auth'])->name('apps_submit');

require __DIR__.'/auth.php';
