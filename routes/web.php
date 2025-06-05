<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// siteInfo
use App\Http\Controllers\SiteInfoController;

// dasbor
use App\Http\Controllers\DasborController;

// theme setups
use App\Http\Controllers\ThemeController;

// klien
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientCaseController;

Route::post('/update-theme', [ThemeController::class, 'updateTheme'])->name('update.theme');

// route login
Route::get('/', function () {
        return redirect()->route('login');
    })->name('login');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/dasbor', [DasborController::class, 'index'])->name('dasbor');

    // manajemen klien
    Route::group(['middleware' => ['role:admin|advokasi|lbh'], 'prefix' => 'client'], function () {

        Route::controller(ClientController::class)->group(function () {

            Route::get('/', 'index')->name('client.index');
            Route::get('/create', 'create')->name('client.create');
            Route::post('/store', 'store')->name('client.store');
            Route::get('/{id}/show', 'show')->name('client.show');
            Route::get('/{id}/edit', 'edit')->name('client.edit');
            Route::put('/{id}/update', 'update')->name('client.update');
            Route::delete('/{id}/forceDelete', 'forceDelete')->name('client.forceDelete');

        });
    });

    // manajemen klien
    Route::group(['middleware' => ['role:admin|advokasi|lbh'], 'prefix' => 'client-case'], function () {

        Route::controller(ClientCaseController::class)->group(function () {

            Route::get('/', 'index')->name('clientCase.index');
            Route::get('/create', 'create')->name('clientCase.create');
            Route::post('/store', 'store')->name('clientCase.store');
            Route::get('/{id}/show', 'show')->name('clientCase.show');
            Route::get('/{id}/edit', 'edit')->name('clientCase.edit');
            Route::put('/{id}/update', 'update')->name('clientCase.update');
            Route::delete('/{id}/forceDelete', 'forceDelete')->name('clientCase.forceDelete');

        });
    });

});

Auth::routes();
