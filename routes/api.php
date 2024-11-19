<?php

use App\Http\Controllers\Api\V1\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1;

Route::apiResource('sites', V1\SiteController::class)->except('show');
Route::apiResource('leads', V1\LeadController::class)->except([
    'show', 'update'
]);

