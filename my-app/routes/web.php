<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RuangController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/unit-kerja', [UnitKerjaController::class, 'index']);
Route::get('/ruang', [RuangController::class, 'index']);
