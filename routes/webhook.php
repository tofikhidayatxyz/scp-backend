<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('pdf', App\Http\Controllers\Webhook\PDFWebhookController::class)->name('webhook.pdf');
Route::post('summary', App\Http\Controllers\Webhook\PDFSummaryController::class)->name('webhook.summary');
Route::post('audio', App\Http\Controllers\Webhook\PDFAudioController::class)->name('webhook.mp3');
