<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// siteInfo 
use App\Http\Controllers\SiteInfoController as SiteInfoController;

// admin
use App\Http\Controllers\admin\DasborController as AdminDasborController;

// staf
use App\Http\Controllers\staf\DasborController as StafDasborController;

// pengacara
use App\Http\Controllers\pengacara\DasborController as PengacaraDasborController;

// advokasi
use App\Http\Controllers\advokasi\DasborController as AdvokasiDasborController;

// lbh
use App\Http\Controllers\lbh\DasborController as LbhDasborController;

// theme setups
use App\Http\Controllers\ThemeController;

Route::post('/update-theme', [ThemeController::class, 'updateTheme'])->name('update.theme');



Route::group(['middleware' => ['auth']], function () {

    // Redirect setelah login berdasarkan role
    Route::get('/', function () {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return redirect('/admin/dasbor');
        } elseif ($user->hasRole('pimpinan')) {
            return redirect('/pimpinan/dasbor');
        } 

        return redirect('/login'); // Default jika tidak ada role
    });


    // admin
    // routes untuk admin
    Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {
        
        // dasbor
        Route::get('/', [AdminDasborController::class, 'index'])->name('admin.dasbor');
        Route::get('/dasbor', [AdminDasborController::class, 'index'])->name('admin.dasbor');
        
        // profil
        Route::get('/profil', [AdminDasborController::class, 'profil'])->name('admin.profil');

        // STATISTIK

        // Statistik Anggota Berdasarkan Status
        Route::get('/statistik/anggota', [AdminDasborController::class, 'getStatistikAnggota'])->name('admin.statistik.anggota');
        
        // Statistik Alumni
        Route::get('/statistik/alumni', [AdminDasborController::class, 'getStatistikAlumni'])->name('admin.statistik.alumni');
        
        // Statistik Program Studi, Fakultas & Universitas
        Route::get('/statistik/program-studi', [AdminDasborController::class, 'getStatistikProgramStudi'])->name('admin.statistik.programstudi');

        
        require 'admin/anggota/anggota.php';
        
        // data master
        require 'admin/datamaster/kampus.php';
        require 'admin/datamaster/fakultas.php';
        require 'admin/datamaster/programstudi.php';

    });
    



    // advokasi
    Route::group(['middleware' => ['role:advokasi'], 'prefix' => 'advokasi'], function () {
        Route::get('/', [AdvokasiDasborController::class, 'index'])->name('advokasi.dasbor');
    });


    // staf
    Route::group(['middleware' => ['role:staf'], 'prefix' => 'staf'], function () {
        Route::get('/', [StafDasborController::class, 'index'])->name('staf.dasbor');
    });

    // pengacara
    Route::group(['middleware' => ['role:pengacara'], 'prefix' => 'pengacara'], function () {
        Route::get('/', [PengacaraDasborController::class, 'index'])->name('pengacara.dasbor');
    });

    // lbh
    Route::group(['middleware' => ['role:lbh'], 'prefix' => 'lbh'], function () {
        Route::get('/', [LbhDasborController::class, 'index'])->name('lbh.dasbor');
    });























    

});

Auth::routes();

