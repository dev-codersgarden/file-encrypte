<?php

use Codersgarden\FileEncrypt\Controller\FileManagementController;
use Illuminate\Support\Facades\Route;



Route::get("download/{ulid}", [FileManagementController::class, 'stream'])->name('download.stream');
Route::post('getDownloadURL', [FileManagementController::class, 'getDownloadPath'])->name('download.getDownloadURL');