<?php

use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/',                 [QrCodeController::class, 'index']);
Route::get('/generate',         [QrCodeController::class, 'generate'])->name('generate');
Route::post('/generate',        [QrCodeController::class, 'generateQrCode']);
Route::get('/{name}',           [QrCodeController::class, 'profile'])->name('profile');
