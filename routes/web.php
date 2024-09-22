<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\KategoriController;


Route::get('/', function () {
    return view('content.dashboard');
});


Route::prefix('kategoris')->name('kategoris.')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('index');
    Route::get('/tambah', [KategoriController::class, 'tambah'])->name('tambah');
    Route::post('/prosesTambah', [KategoriController::class, 'prosesTambah'])->name('prosesTambah');
    Route::get('/hapus/{id}', [KategoriController::class, 'hapus'])->name('hapus');
});
