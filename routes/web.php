<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdemServicoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gerar-pdf', [OrdemServicoController::class, 'gerarPdf']);
Route::get('/preview-os', [App\Http\Controllers\OrdemServicoController::class, 'previewHtml']);
