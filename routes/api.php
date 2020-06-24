<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('V1')->as('v1.')->prefix('v1')->group(function()
{
    Route::prefix('auth')->as('auth.')->group(function()
    {
        Route::post('/', 'AuthController@login')->name('login');
    });

    Route::resource('posts', 'PostsController');
});
