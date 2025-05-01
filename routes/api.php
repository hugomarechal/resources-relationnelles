<?php

use App\Http\Controllers\API\CommentaireController;
use App\Http\Controllers\Api\DepartementController;
use App\Http\Controllers\API\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegionController;
use App\Http\Controllers\API\RelationTypeController;
use App\Http\Controllers\API\RessourceCategorieController;
use App\Http\Controllers\API\RessourceController;
use App\Http\Controllers\API\RessourcePartageController;
use App\Http\Controllers\API\RessourceTypeController;
use App\Http\Controllers\API\UserController;

Route::apiResource('regions', RegionController::class);
Route::apiResource('departements', DepartementController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('ressources', RessourceController::class);
Route::apiResource('ressource_types', RessourceTypeController::class);
Route::apiResource('ressource_categories', RessourceCategorieController::class);
Route::apiResource('relation_types', RelationTypeController::class);
Route::apiResource('messages', MessageController::class);
Route::apiResource('commentaires', CommentaireController::class);
Route::apiResource('ressource_partages', RessourcePartageController::class);
