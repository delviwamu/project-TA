<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlienController;

Route::controller(KlienController::class)->group(function(){

    // index
    Route::get('klien','index')->name('klien.advokasi.index');

    // create
    Route::get('klien/tambah','create')->name('klien.advokasi.create');

    // store
    Route::post('klien/store','store')->name('klien.advokasi.store');

    // show
    Route::get('klien/{id}/detail','show')->name('klien.advokasi.show');

    // edit
    Route::get('klien/{id}/ubah','edit')->name('klien.advokasi.edit');

    // edit password
    Route::get('klien/{id}/edit/password','edit_password')->name('klien.advokasi.edit.password');

    // update
    Route::put('klien/{id}/update','update')->name('klien.advokasi.update');

    // update password
    Route::put('klien/{id}/update/password','update_password')->name('klien.advokasi.update.password');

    // destroy
    Route::get('klien/{id}/hapus','destroy')->name('klien.advokasi.delete');

    // trash
    Route::get('klien/tempat-sampah','trash')->name('klien.advokasi.trash');

    // restore
    Route::put('klien/{id}/restore','restore')->name('klien.advokasi.restore');

    // delete
    Route::delete('klien/{id}/delete','delete')->name('klien.advokasi.destroy');

    // tempat sampah (alias)
    Route::get('klien/tempat-sampah', 'sampah')->name('klien.advokasi.sampah');

    // Delete Permanent
    Route::delete('klien/{id}/ForceDelete','ForceDelete')->name('klien.advokasi.ForceDelete');
});
