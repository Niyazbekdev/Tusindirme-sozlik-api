<?php


use App\Http\Controllers\User\ErrorWordController;
use App\Http\Controllers\User\ManySearchWordController;
use App\Http\Controllers\User\RandomWordController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\WordController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users/words', WordController::class);
Route::apiResource('search-words', SearchController::class);
Route::apiResource('many-search-words', ManySearchWordController::class);
Route::apiResource('random-words', RandomWordController::class);
Route::apiResource('error-words', ErrorWordController::class);
