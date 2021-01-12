<?php

use App\Models\Tenant;
use App\Models\Tenant\User;
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

Route::view('/', 'welcome');
Route::resource('tenants', 'TenantController');

Route::namespace('Tenant')->group(function () {
    Route::resource('users', 'UserController');
});
