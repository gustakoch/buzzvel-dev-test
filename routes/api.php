<?php

use App\Http\Controllers\QrCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/entries',  [QrCodeController::class, 'entries']);
