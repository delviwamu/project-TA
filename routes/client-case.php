<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientCaseController;

Route::controller(ClientCaseController::class)->group(function(){

    // index
    Route::get('/','index')->name('clientCase.index');

    // create
    Route::get('/create','create')->name('clientCase.create');

    // store
    Route::post('/store','store')->name('clientCase.store');

    // show
    Route::get('/{id}/show','show')->name('clientCase.show');

    // edit
    Route::get('/{id}/edit','edit')->name('clientCase.edit');

    // update
    Route::put('/{id}/update', 'update')->name('clientCase.update');

    // forceDelete
    Route::delete('/{id}/forceDelete','forceDelete')->name('clientCase.forceDelete');

});
