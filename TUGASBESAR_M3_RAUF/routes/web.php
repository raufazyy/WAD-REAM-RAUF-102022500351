<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpeakerController;

//nyoba


// halaman awal
Route::get('/', [SpeakerController::class, 'index']);

// buat narsum
Route::get('/speakers/tambah', [SpeakerController::class, 'create']);
Route::post('/speakers/tambah', [SpeakerController::class, 'store']);

// edit update narsum
Route::get('/speakers/{id}/edit', [SpeakerController::class, 'edit']);
Route::put('/speakers/{id}', [SpeakerController::class, 'update']);

// hapus narsum
Route::delete('/speakers/{id}', [SpeakerController::class, 'destroy']);