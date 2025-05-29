<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);

use App\Livewire\Ruang\ListRuang;

Route::get('/ruang', ListRuang::class)->name('ruang.index');

use App\Livewire\Ruang\CreateRuang;

Route::get('/ruang/create', CreateRuang::class)->name('ruang.create');
