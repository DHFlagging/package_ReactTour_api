<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['App\Http\Middleware\azureADAuth'])->prefix('reacttour')->group(function () {
    Route::get('trainingsteps',function () {
        
    });
});