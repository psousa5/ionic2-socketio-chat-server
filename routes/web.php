<?php

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

Route::post('whisper', "ChatController@sendWhisper")->middleware(['cors']);

Route::get('/', function(){
    // this doesn't do anything other than to
    // tell you to go to /fire
    return "go to /send";
});