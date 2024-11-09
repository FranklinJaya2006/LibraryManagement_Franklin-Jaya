<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Library;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/library', [Library::class, 'filter'])->name('library');