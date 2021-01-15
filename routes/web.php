<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::post('/', 'App\Http\Controllers\MainController@index');
Route::post('/bot/getupdates', function() {
    $updates = Telegram::getUpdates();
    return (json_encode($updates));
});
