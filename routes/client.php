<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::controller(ClientController::class)->group(function(){

    // index
    Route::get('/','index')->name('client.index');

    // create
    Route::get('/create','create')->name('client.create');

    // store
    Route::post('/store','store')->name('client.store');

    // show
    Route::get('/{id}/show','show')->name('client.show');

    // edit
    Route::get('/{id}/edit','edit')->name('client.edit');

    // update
    Route::put('/{id}/update', 'update')->name('client.update');

    // forceDelete
    Route::delete('/{id}/forceDelete','forceDelete')->name('client.forceDelete');

});
