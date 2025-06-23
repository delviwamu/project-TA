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
use App\Http\Controllers\CourtSessionController;

// statistik
use App\Http\Controllers\statistik\StatistikClientController;

Route::post('/update-theme', [ThemeController::class, 'updateTheme'])->name('update.theme');

// route login
Route::get('/', function () {
        return redirect()->route('login');
    })->name('login');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/dasbor', [DasborController::class, 'index'])->name('dasbor');

    // statistik
    Route::group(['middleware' => ['role:admin|advokasi|lbh|staf'], 'prefix' => 'statistik'], function () {

        // statistik klien
        Route::controller(StatistikClientController::class)->group(function () {
            Route::get('/client', 'index')->name('statistik.client.index')->middleware('role:admin|advokasi|lbh|staf');
            Route::get('api/client', 'statistikClientBerdasarkanBulan')->middleware('role:admin|advokasi|lbh|staf');
        });


    });

    // manajemen klien
    Route::group(['middleware' => ['role:admin|advokasi|lbh|staf'], 'prefix' => 'client'], function () {

        Route::controller(ClientController::class)->group(function () {

            Route::get('/', 'index')->name('client.index')->middleware('role:admin|advokasi|lbh|staf');
            
            // Route::middleware(['role:staf'])->get('/', 'index')->name('client.index');

            Route::get('/create', 'create')->name('client.create');
            Route::post('/store', 'store')->name('client.store');
            Route::get('/{id}/show', 'show')->name('client.show')->middleware('role:admin|advokasi|lbh|staf');
            Route::get('/{id}/edit', 'edit')->name('client.edit');
            Route::put('/{id}/update', 'update')->name('client.update');
            Route::delete('/{id}/forceDelete', 'forceDelete')->name('client.forceDelete');

        });
    });

    // manajemen kasus klien
    Route::group(['middleware' => ['role:admin|advokasi|lbh|staf'], 'prefix' => 'client-case'], function () {

        Route::controller(ClientCaseController::class)->group(function () {

            Route::get('/', 'index')->name('clientCase.index')->middleware('role:admin|advokasi|lbh|staf');
            Route::get('/create', 'create')->name('clientCase.create');
            Route::post('/store', 'store')->name('clientCase.store');
            Route::get('/{id}/show', 'show')->name('clientCase.show')->middleware('role:admin|advokasi|lbh|staf');
            Route::get('/{id}/edit', 'edit')->name('clientCase.edit');
            Route::put('/{id}/update', 'update')->name('clientCase.update');
            Route::delete('/{id}/forceDelete', 'forceDelete')->name('clientCase.forceDelete');

        });
    });

    // manajemen sidang
    Route::group(['middleware' => ['role:admin|advokasi|lbh|staf'], 'prefix' => 'court-session'], function () {

        Route::controller(CourtSessionController::class)->group(function () {

            Route::get('/', 'index')->name('courtSession.index')->middleware('role:admin|advokasi|lbh|staf');
            Route::get('/create', 'create')->name('courtSession.create');
            Route::post('/store', 'store')->name('courtSession.store');
            Route::get('/{id}/show', 'show')->name('courtSession.show')->middleware('role:admin|advokasi|lbh|staf');
            Route::get('/{id}/edit', 'edit')->name('courtSession.edit');
            Route::put('/{id}/update', 'update')->name('courtSession.update');
            Route::delete('/{id}/forceDelete', 'forceDelete')->name('courtSession.forceDelete');

        });
    });

});

Auth::routes();
