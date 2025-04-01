<?php

use App\Http\Controllers\Api\DepartementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegionController;

Route::apiResource('regions', RegionController::class);
Route::apiResource('departements', DepartementController::class);
